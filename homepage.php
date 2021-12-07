<?php include 'includes/session.php'?>
<?php include 'includes/header.php'?>
    <body id="page-top">
        <!-- Navigation-->
      <?php include_once 'views/navigation-authenticated.html' ;?>
        
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
                                            <div class="row gy-2">
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

                                            <div class="col-6">
                                                <select name="branch" id="" class="form-select" onchange='fetchCasketType(this.value)' required>   
                                                    <option selected>-- Select Package --</option>
                                                    <?php
                        
                                                    $sql_package = "SELECT * FROM service";
                                                    $query = $conn->query($sql_package);
                                                    while($service_result = $query->fetch_assoc())
                                                    {
                                                        echo "<option value='".$service_result['service_id']."'>".$service_result['service']."</>";
                                                    }
                                                    ?>
                                                </select>
                                                    <small class="font-italic text-green text-muted">Package</small>
                                            </div> 
                                            
                                            <div class="col-6">
                                                <select name="branch" id="casket-type" class="form-select" required>   
                                                    <option selected>-- Select Casket Type --</option>
                                                </select>
                                                <small class="font-italic text-green text-muted">Casket</small>
                                            </div> 
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
       
        <?php include ('includes/footer.php') ?> 
        <?php include ('includes/scripts.php') ?>
        <script>
function fetchCasketType(val)
    {
        $.ajax({
        type: 'post',
        url: 'fetch-casket.php',
        data: {
        id:val
        },
        success: function (response) {
            document.getElementById("casket-type").innerHTML=response;
        }
    });
     }

        </script>
    </body>
</html>
