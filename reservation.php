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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold txt-custom" href="#page-top"><small class="txt-custom fw-bold"> Funeraria Santa Rita de Casia</small></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        
                        <li class="nav-item"><a class="nav-link me-lg-3" href="homepage.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3 active" href="reservation.php">My Reservations</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3 " href="">Kasurog</a></li>
                        
                        <hr> 
                        
                    </ul>
                    <div class="dropdown">
                        <button class="btn btn-custom text-white fw-bold btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span><?php echo $user['client_firstname'] . ' ' . $user['client_lastname'];?></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="change-password.php?id=<?php echo $user['client_id'];?>&name=<?php echo $user['client_firstname'];?> " class="dropdown-item dropdown-footer"><i class="fas fa-edit"></i> Change Password </a></li>
                            <li><a href="logout.php" class="dropdown-item dropdown-footer"><i class="fas fa-power-off"></i> Log out </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
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
                            </thead>
                            <tbody>
                                <?php
                                    $fetch_reservation = "SELECT * FROM reservation LEFT JOIN branches ON reservation.branch_id = branches.branch_id WHERE reservation.client_id = '".$_SESSION['client']."' AND YEAR(reservation.reservation_date) = '".$year."' ORDER BY reservation.reservation_date DESC";
                                    $query = $conn->query($fetch_reservation);
                                    $no = 1;
                                    while($row = $query->fetch_assoc()) {  ?>
                                    
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['reservation_code']; ?></td>
                                        <td><?php echo $row['branch_name'] ?></td>
                                        <td><?php echo $row['branch_address'] ?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['reservation_date'])) ?></td>
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
