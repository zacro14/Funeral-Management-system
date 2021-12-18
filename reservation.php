<?php include 'includes/session.php'?>
<?php include 'includes/header.php'?>
<?php
	$timezone = 'Asia/Manila';
	date_default_timezone_set($timezone);
    $today = date('Y-m-d');
    $year = date('Y');
    if(isset($_GET['year'])){
        $year = $_GET['year'];
    }
?>
    <body id="page-top">
        <!-- Navigation-->
        <?php include_once 'views/navigation-authenticated.html' ?>        
        <section class="testimonials mt-3">
            <div class="container">
                <h4>Reservation History</h4>
                <div class="row">
                    <div class="col-md-2">
                        <label>Select Year: </label>
                        <select class="form-select" style="min-width: 50%;" id="select_year">
                        <?php
                            for($i=2015; $i<=2065; $i++){
                            $selected = ($i==$year)?'selected':'';
                            echo "
                                <option value='".$i."' ".$selected.">".$i."</option>
                            ";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <table class="table table-bordered">
                            <thead style="background-color: #e8bc85">
                                <th>No.</th>
                                <th>Reservation Code</th>
                                <th>Branch</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php
                                    //$fetch_reservation = "SELECT * FROM reservation LEFT JOIN branches ON reservation.branch_id = branches.branch_id WHERE reservation.client_id = '".$_SESSION['client']."' AND YEAR(reservation.reservation_date) = '".$year."' ORDER BY reservation.reservation_date DESC";
                                    $reservation = "SELECT * FROM reservation 
                                                    LEFT JOIN branches ON reservation.branch_id = branches.branch_id 
                                                    WHERE reservation.client_id = '".$_SESSION['client']."' ORDER BY reservation.reservation_date DESC";

                                    $query = $conn->query($reservation);
                                    $no = 1;
                                    while($row = $query->fetch_assoc()) { 
                            
                                        if($row['reservation_status'] === 'APPROVED'){
                                            $status =  '<span class="badge rounded-pill bg-success pull-left">APPROVE</span>';
                                        } elseif($row['reservation_status'] === 'PENDING'){
                                            $status = '<span class="badge rounded-pill bg-danger pull-left">PENDING</span>';
                                        }else{
                                            $status = '<span class="badge rounded-pill bg-warning pull-left">CANCELED</span>';   
                                        }
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['reservation_code']; ?></td>
                                        <td><?php echo $row['branch_name'] ?></td>
                                        <td><?php echo $row['branch_address'] ?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['reservation_date'])) ?></td>
                                        <td><?php echo $status;?>
                                    </tr>
                                  
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
       
        <!--<?php include 'includes/footer.php' ?>-->
       
        <?php include 'includes/scripts.php' ?>

        <script>
            $(function(){
            $('#select_year').change(function(){
                window.location.href = 'reservation.php?year='+$(this).val();
            });
            });
        </script>
    </body>
</html>
