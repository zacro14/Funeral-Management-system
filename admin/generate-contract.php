<?php
    require_once 'includes/session.php';
    require_once 'fpdf/fpdf.php';

    if(isset($_SESSION['contract_id']) or isset($_GET['id']))
    {
        $id = $_GET['id'];
        
    $timezone = 'Asia/Manila';
	date_default_timezone_set($timezone);

    $date = date('M d, Y');

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
           // $this->Cell(0,10,$this->PageNo(),0,0,"R");
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

        var $B=0;
    var $I=0;
    var $U=0;
    var $HREF='';
    var $ALIGN='';

    function WriteHTML($html)
    {
        //HTML parser
        $html=str_replace("\n",' ',$html);
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                elseif($this->ALIGN=='center')
                    $this->Cell(0,5,$e,0,1,'C');
                else
                    $this->Write(5,$e);
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract properties
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $prop=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $prop[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$prop);
                }
            }
        }
    }

    function OpenTag($tag,$prop)
    {
        //Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF=$prop['HREF'];
        if($tag=='BR')
            $this->Ln(5);
        if($tag=='P')
            $this->ALIGN=$prop['ALIGN'];
        if($tag=='HR')
        {
            if( !empty($prop['WIDTH']) )
                $Width = $prop['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $this->Ln(2);
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.4);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(2);
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='P')
            $this->ALIGN='';
    }

    function SetStyle($tag,$enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
    }

    $pdf = new _PDF("P","mm","A4");
    $pdf->SetMargins(20,15); 
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //$pdf->SetTextColor(0x00, 0x00, 0x00);

    $pdf->Image('../design/assets/img/logo.jpeg',30,13,20,"C");

    $pdf->SetFont('helvetica','B',15);
    $pdf->Cell(0, 5,"FUNERARIA STA. RITA DE CASIA", 0, 1, "C");
    
    $pdf->SetFont('helvetica','B',12);
    $pdf->Cell(0, 5,$branch, 0, 1, "C");

    $pdf->SetFont('helvetica','',10);
    $pdf->Cell(0, 5, $address, 0, 1, "C");

    $pdf->Ln();$pdf->Ln();$pdf->Ln();
    $pdf->SetFont('helvetica','',15);
    $pdf->Cell(0,5, 'FUNERAL SERVICE CONTRACT', 0,1,'C');

    $pdf->Ln();
    $pdf->SetFont('helvetica','',10);
    $pdf->Cell(0,5, 'Date:    '.$date, 0,1,'R');

    $pdf->Ln();
    $pdf->SetFont('helvetica','',10);
    $pdf->Cell(0,5, 'This certifies that funeral service has been contracted by:', 0,1,'L');

    $pdf->Ln();
    $pdf->SetFont('helvetica','b',11);
    $pdf->CellFitScale(87, 8, "Contracting Party", 1, 0,"C");
    $pdf->CellFitScale(87, 8,'Deceased Details',1,0,'C');

    $pdf->Ln();
    $fetch_con = "SELECT * FROM contract 
                LEFT JOIN client ON contract.client_id = client.client_id 
                LEFT JOIN service ON contract.service_id = service.service_id 
                LEFT JOIN deceased ON deceased.deceased_id = contract.deceased_id 
                LEFT JOIN casket ON casket.casket_id = contract.casket_id 
                LEFT JOIN payments ON payments.contract_id = contract.contract_unique_id
                LEFT JOIN chapel ON contract.chapel_id = chapel.chapel_id 
                WHERE contract_unique_id = '".$id."'";
    $query_con = $conn->query($fetch_con); 
    $numeric_no = 1;
    while($row = $query_con->fetch_assoc())
    {   
        //client
      $clientFirstname =  ucwords($row['client_firstname']);
      $clientLastname =  ucwords($row['client_lastname']);
      $clientMiddlename =  ucwords($row['client_middlename']);

      //deceased details
      $deceasedFirstname = ucwords($row['deceased_fname']);
      $deceasedMiddlename = ucwords($row['deceased_mname']);
      $deceasedLastname = ucwords($row['deceased_lname']);

      //relation to deceased
      $relationTodeceased = ucwords($row['relation_to_deceased']);

      //religion
      $religion = ucwords($row['religion']);

      //casket amount
      $casketAmount = number_format($row['amount'], 2);

      //balance
      $balance = number_format($row['balance'], 2);

      //partial payment
      $payment = number_format($row['payment_amount'], 2);

      $chapel = $row['chapel_name'];

        $pdf->SetFont('helvetica','',10);
        $pdf->CellFitScale(87, 6, 'Name: '.$clientFirstname.' '.$clientMiddlename.' '.$clientLastname, 1, 0,"L");
        $pdf->CellFitScale(87, 6, 'Name: '.$deceasedFirstname.' '.$deceasedMiddlename.' '.$deceasedLastname, 1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(87, 6, 'Address: ', 1, 0,"L");
        $pdf->CellFitScale(87, 6, 'Born: '. date('M d, Y', strtotime($row['date_of_birth'])),1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(87, 6, ' ', 1, 0,"L");
        $pdf->CellFitScale(87, 6, 'Age: '. $row['age'],1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(87, 6, 'Contact No. '.$row['client_phone'], 1, 0,"L");
        $pdf->CellFitScale(87, 6, 'Died: '. date('M d, Y', strtotime($row['date_died'])),1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(87, 6, 'Relation to Deceased:  '.$relationTodeceased, 1, 0,"L");
        $pdf->CellFitScale(87, 6, 'Religion: '.$religion,1, 0,"L");
        $pdf->Ln();
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Type of Service:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, $row['service'],1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Casket Type:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, $row['casket_type'],1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Chandeliers and Vigil Equip:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, ' ',1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Chapel Viewing:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, $chapel ,1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Transport of body/remains:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, ' ',1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Other charges (pls. specify):', 1, 0,"L");
        $pdf->CellFitScale(114, 6, ' ',1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, ' ', 1, 0,"L");
        $pdf->CellFitScale(114, 6, ' ',1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, ' ', 1, 0,"L");
        $pdf->CellFitScale(114, 6, ' ',1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Total Amount:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, $casketAmount,1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, ' ', 1, 0,"L");
        $pdf->CellFitScale(114, 6, ' ',1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Partial Payment:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, $payment,1, 0,"L");
        $pdf->Ln();
        $pdf->CellFitScale(60, 6, 'Balance:', 1, 0,"L");
        $pdf->CellFitScale(114, 6, $balance,1, 0,"L");
        $pdf->Ln();

        
        $pdf->WriteHTML('                I/We hereby agree and bind myself/ourselves to the above terms and conditions and promise to pay the balance of '.$casketAmount.' on all overdue accounts and an additional of fifteen percent (15%) of the amount due shall be charged for attorney`s fee and cost suit in case of litigation. Parties submit themselves to the jurisdiction of the court of any legal action arising out of this transaction.');
        $pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();

        $pdf->SetFont('helvetica','i',10);
        $pdf->CellFitScale(87, 8, 'Conform', 0, 0,"L");
        $pdf->CellFitScale(87, 8, 'Funeraria Sta Rita de Casia',0, 0,"R");
        $pdf->Ln();$pdf->Ln();$pdf->Ln();

        $pdf->SetFont('helvetica','',11);
        $pdf->CellFitScale(58, 8, $clientFirstname.' '.$clientMiddlename.' '.$clientLastname, 0, 0,"C");
        $pdf->CellFitScale(58, 8, ' ', 0, 0,"l");
        $pdf->CellFitScale(58, 8, 'SUSAN CASTILLA-ALBA', 0, 0,"C");

        $pdf->Ln();
        $pdf->WriteHTML('-----------------------------------------------                                                        -----------------------------------');
         

        $pdf->Ln();
        $pdf->SetFont('helvetica','',10);
         $pdf->CellFitScale(58, 5, 'Contracting Party', 0, 0,"C");
        $pdf->CellFitScale(58, 5, ' ', 0, 0,"l");
        $pdf->CellFitScale(58, 5, 'Manager', 0, 0,"C");

        $pdf->Ln();
    }
    
    
    
    $pdf->Ln();
    
    $pdf->Output($id.".pdf", "i");
   
}
?>












