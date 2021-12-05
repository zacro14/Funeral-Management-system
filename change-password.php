<?php include 'includes/db-connection.php' ?>
<?php
    if(isset($_GET['id']) && ($_GET['name']))
    {
        $client_id = $_GET['id'];
        $client_name = $_GET['name'];

        $client_password = "";

        $fetch_client = "SELECT * FROM client WHERE client_id = '".$client_id."'";
        $query = $conn->query($fetch_client);
        while($row = $query->fetch_assoc())
        {
            $client_id = $_GET['id'];
            $client_password = md5($row['client_password']);
        }
    }
?>

<?php
    session_start();
    if(isset($_POST['btn-update-profile']))
    {
        $client_id = $_GET['id'];
        
        $client_password_update      =   md5($_POST['client_password_update']);
        
        $update_query = "UPDATE client SET client_password = '$client_password_update' WHERE client_id = '".$client_id."' ";
        $result = $conn->query($update_query);
        if($result == TRUE  ){
			$_SESSION['success-update'] = 'Password changed!';
		}
		else{
			$_SESSION['error-update'] = $conn->error;
		}
        header('location:homepage.php');
    }
?>  
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
                    <a href="homepage.php" class="btn bg-black rounded-pill px-3 mb-2 mb-lg-0 mx-0 text-white btn-custom" >
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
                <form  method="POST" action=""
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="box-body">
                        <div class="row ">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h3 style="color: #222d32;">Change Password</h3>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control"
                                    name="client_password_update" value="<?php echo $client_password;?>" required/>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-custom text-white" name="btn-update-profile">Update <i class="fas fa-save"></i></button>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
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
