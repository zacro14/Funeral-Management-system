<?php include 'includes/session.php'?>
<?php include 'includes/header.php'?>
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
                        
                        <li class="nav-item"><a class="nav-link me-lg-3 active" href="homepage.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3 " href="reservation.php">My Reservations</a></li>
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
                <?php
                    if(isset($_SESSION['success-update'])){
                        echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>INFO: </strong> ".$_SESSION['success-update']."
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        ";
                        unset($_SESSION['success-update']);
                    }
                    if(isset($_SESSION['error-update'])){
                        echo "
                            <div class='alert alert-error alert-dismissible fade show' role='alert'>
                                <strong>ERROR! </strong> ".$_SESSION['error-update']."
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        ";
                        unset($_SESSION['error-update']);
                    }
                ?>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-secondary">Create Reservation</h3>
                            </div>
                                <div class="card-body">
                                    <form action="reservation-add.php" method="POST" class="form-group" autocomplete="off">
                                        <div class="form-group">
                                            <?php
                                            if(isset($_SESSION['error-reservation'])){
                                                echo "
                                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                        <strong>ERROR!</strong> ".$_SESSION['error-reservation']."
                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                ";
                                                unset($_SESSION['error-reservation']);
                                            }
                                            if(isset($_SESSION['success-reservation'])){
                                                echo "
                                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                        <strong>INFO: </strong> ".$_SESSION['success-reservation']."
                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                ";
                                                unset($_SESSION['success-reservation']);
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" name="client" class="form-control" value="<?php echo $_SESSION['client']; ?>"/>  
                                                    <select name="branch" id="" class="form-select" required>
                                                        <option value="" selected>-- Select Branch --</option>
                                                        <?php
                                                            $branch_query = "SELECT * FROM branches";
                                                            $query = $conn->query($branch_query);
                                                            while($branch_row = $query->fetch_assoc())
                                                            {
                                                                echo "<option value='".$branch_row['branch_id']."'>".$branch_row['branch_name']."</>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <small class="font-italic text-green text-muted">Branch</small>
                                                </div>
                                                <div class="col-6">
                                                    <input type="date" name="date" class="form-control" required>
                                                    <small class="font-italic text-green text-muted">Date</small>
                                                </div>
                                            </div>
                                           
                                            <div class="float-right">
                                                <button type="submit" name="add-reservation" class="btn btn-custom text-white fw-bold">SUBMIT <i class="fas fa-save"></i> </button>
                                            </div>
                                        </div>    
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!--<?php include 'includes/footer.php' ?>-->
       
        <?php include 'includes/scripts.php' ?>
    </body>
</html>
