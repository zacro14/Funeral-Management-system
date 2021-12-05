<?php
    require_once 'includes/session.php';
    require_once 'fpdf/fpdf.php';

    $sql = "SELECT * FROM admin LEFT JOIN branches ON admin.branch_id = branches.branch_id WHERE admin.admin_id = '".$_SESSION['admin']."' AND branches.branch_id = '".$_SESSION['branch']."'";
	$query = $conn->query($sql);
    $row = $query->fetch_assoc();
    $branch = $row['branch_name'];
    $address = $row['branch_address'];

    class _PDF extends FPDF
    {
        public function Header()
        {

        }

        public function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','',10);
            $this->Cell(0,10,$this->PageNo(),0,0,"R");
        }

        function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
        {
            //Get string width
            $str_width=$this->GetStringWidth($txt);

            //Calculate ratio to fit cell
            if($w==0)
                $w = $this->w-$this->rMargin-$this->x;
            $ratio = ($w-$this->cMargin*2)/$str_width;

            $fit = ($ratio < 1 || ($ratio > 1 && $force));
            if ($fit)
            {
                if ($scale)
                {
                    //Calculate horizontal scaling
                    $horiz_scale=$ratio*100.0;
                    //Set horizontal scaling
                    $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
                }
                else
                {
                    //Calculate character spacing in points
                    $char_space=($w-$this->cMargin*2-$str_width)/max(strlen($txt)-1,1)*$this->k;
                    //Set character spacing
                    $this->_out(sprintf('BT %.2F Tc ET',$char_space));
                }
                //Override user alignment (since text will fill up cell)
                $align='';
            }

            //Pass on to Cell method
            $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

            //Reset character spacing/horizontal scaling
            if ($fit)
                $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
        }

        //Cell with horizontal scaling only if necessary
        function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
        }

        //Cell with horizontal scaling always
        function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
        }

        //Cell with character spacing only if necessary
        function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
        }

        //Cell with character spacing always
        function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            //Same as calling CellFit directly
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
        }
    }

    $pdf = new _PDF("P","mm","A4");
    $pdf->SetMargins(20,15); 
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //$pdf->SetTextColor(0x00, 0x00, 0x00);

    $pdf->Image('../design/assets/img/logo.jpeg',30,13,20,"C");

    $pdf->SetFont('helvetica','B',15);
    $pdf->Cell(0, 5,"FUNERARIA STA. RITA DE CASCIA", 0, 1, "C");
    
    $pdf->SetFont('helvetica','B',12);
    $pdf->Cell(0, 5,$branch, 0, 1, "C");

    $pdf->SetFont('helvetica','',10);
    $pdf->Cell(0, 5, $address, 0, 1, "C");

    $pdf->Ln();$pdf->Ln();
    $pdf->SetFont('helvetica','',12);
    $pdf->Cell(0,5, 'Reservation Lists - '.$branch, 0,1,'C');

    $pdf->Ln();
    $pdf->SetFont('helvetica','b',12);
    $pdf->CellFitScale(7, 8, "#", 1, 0,"C");
    $pdf->CellFitScale(40,8,'Reservation Code',1,0,'C');
    $pdf->CellFitScale(63,8,'Name',1,0,'C');
    $pdf->CellFitScale(35,8,'Date',1,0,'C');
    $pdf->CellFitScale(30,8,'Status',1,0,'C');
    
    $pdf->Ln();
    $fetch_res = "SELECT * FROM reservation LEFT JOIN client ON client.client_id = reservation.client_id LEFT JOIN branches ON branches.branch_id = reservation.branch_id WHERE reservation.branch_id = '".$user['branch_id']."' ORDER BY reservation.reservation_date, reservation.reservation_status = 'PENDING' desc";
    $query_res = $conn->query($fetch_res);
    $numeric_no = 1;
    while($row = $query_res->fetch_assoc())
    {   
        $pdf->SetFont('helvetica','',11);
        $pdf->CellFit(7, 8, $numeric_no++, 1, 0,"L");
        $pdf->CellFitScale(40,8,$row['reservation_code'],1,0,'L');
        $pdf->CellFitScale(63,8, $row['client_firstname']. ' ' . $row['client_middlename']. ' ' . $row['client_lastname'],1,0,'L');
        $pdf->CellFitScale(35,8,date('M d, Y', strtotime($row['reservation_date'])),1,0,'L');
        $pdf->CellFitScale(30,8,$row['reservation_status'],1,0,'L');

        $pdf->Ln();
    }


    $pdf->Output("reservations.pdf", "i");
?>