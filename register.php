<?php session_start();?>
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
                       
                    </ul>
                    <hr>
                    <a href="index.php" class="btn bg-black rounded-pill px-3 mb-2 mb-lg-0 mx-0 text-white btn-custom" >
                        <span class="d-flex align-items-center">
                            <i class="fa fa-home me-2"></i>
                            <span class="small">Back to Home</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
        

        <section class="page-section mt-3 px-5">
            <div class="box box-header"> 
            <?php
                if(isset($_SESSION['reg-error'])){
                    echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>ERROR!</strong> ".$_SESSION['reg-error']."
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    ";
                    unset($_SESSION['reg-error']);
                }
            ?>        
                <form  method="POST" action="register-query.php"
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="box-body">
                        <div class="row ">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h3 style="color: #222d32;">Basic Information</h3>
                                </div>
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" class="form-control"
                                    name="client_firstname" value=""  required/>
                                </div>
                                <div class="form-group">
                                    <label for="">Middlename</label>
                                    <input type="text" class="form-control"
                                    name="client_middlename" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="">Lastname</label>
                                    <input type="text" class="form-control"
                                    name="client_lastname" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control"
                                    name="client_email" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="number" class="form-control"
                                    name="client_number" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h3 style="color: #222d32;">Login Information</h3>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control"
                                    name="client_username" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control"
                                    name="client_password" value="" required/>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-custom text-white" name="btn-register">Register</button>
                                    <br><br>
                                    Already have an account? <strong><a class="" href="login-form.php">Go to login.</a></strong>
                                    
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div> 
                </form>
                <div class="box-footer">
                
                </div>
            </div>
		</section>

        <!--<?php include 'includes/footer.php' ?>-->
       
        <?php include 'includes/scripts.php' ?>
    </body>
</html>
