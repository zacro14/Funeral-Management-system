<?php
  session_start();
  if(isset($_SESSION['client'])){
    header('location:homepage.php');
  }
?>
<?php include 'includes/header.php'?>

<script type="text/javascript" language="javascript">
      window.history.forward();
</script>
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
   
        

        <section class="page-section mt-5" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Log in</h2>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <?php
                            if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>ERROR!</strong> ".$_SESSION['error']."
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                            ";
                            unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['reg-success'])){
                                echo "
                                    <div class='alert alert-success' role='alert'>
                                        <hr>
                                        <h4 class='alert-heading'>Registration Successful!</h4>
                                        <p>".$_SESSION['reg-success']."</p>
                                        <hr>
                                    </div>
                                ";
                                unset($_SESSION['reg-success']);
                                }
                        ?>
                        <form id="contactForm" action="login-query.php" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="username" type="text" placeholder="name@example.com" data-sb-validations="required,text" required/>
                                <label for="email">Email address/Username</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email/username is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email/username is not valid.</div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" data-sb-validations="required" required/>
                                <label for="password">Password</label>
                            </div>

                            <div class="d-grid"><button class="btn btn-xl  btn-custom text-white" id="submitButton" type="submit" name="btn-login">Log In</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        Don't have account yet? <strong><a class="" href="register.php">Register Here.</a></strong>
                    </div>
                </div>
            </div>
        </section>

        <!--<?php include 'includes/footer.php' ?>-->
       
        <?php include 'includes/scripts.php' ?>
    </body>
</html>
