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
                                    <div class="row"><div class="col-lg-12"><h4 class=" text-dark">Reservation Details</h4></div></div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                <label for="">Branch</label>
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
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                <label class="text-capitalize" for="">Date of your Reservation</label>
                                                    <input id="date" type="text" onfocus="(this.type = 'date')" placeholder="Enter Date" name="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" onchange="checkDate(this.value);" required>
        
                                                </div>
                                             
                                            <div class="col-md-4">
                                             <div class="form-group">
                                             <label for="">Select Package</label>
                                                <select name="package" id="" class="form-select" required  onchange='fetchCasketType(this.value);' >   
                                                    <option value="" selected>--- Select Package ---</option>
                                                    <?php
                        
                                                    $sql_package = "SELECT * FROM service";
                                                    $query = $conn->query($sql_package);
                                                    while($service_result = $query->fetch_assoc())
                                                    {
                                                        echo "<option value='".$service_result['service_id']."'>".$service_result['service']."</>";
                                                    }
                                                    ?>
                                                </select>
                                                    
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-4">
                                                <label for="">Casket Type</label>
                                                    <select name="casket" id="casket-type" class="form-select"  onchange='getPrice(this.value);' required>   
                                                        <option value="" selected>--- Select Casket Type ---
                                                        </option>
                                                    </select>
                                                    <small class="text-dark font-italic text-capitalize">please select package*</small> 
                                            </div> 

                                        <div class="col-sm-4">
                                        <label for="">Casket Price</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">&#8369;</span>
                                                    <input id="price" readonly 
                                                    placeholder="0.00" 
                                                    type="text" 
                                                    value="" 
                                                    class="form-control" 
                                                    aria-label="Amount (Price)"
                                                    required
                                                    >
                                            </div>
                                        </div>

                                        </div>

                                    <hr>
                                <div class="row"><div class="col-lg-12"><h4 class=" text-dark">Deceased Details</h4></div></div>
                                
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Firstname</label>
                                        <input type="text" class="form-control"
                                            name="deceased_firstname" value=""  placeholder="Enter here..." required/>
                                    </div>
                                </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Middlename</label>
                                            <input type="text" class="form-control"
                                            name="deceased_middlename" value=""  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lastname</label>
                                            <input type="text" class="form-control"
                                            name="deceased_lastname" value=""  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Date of Birth</label>
                                            <input type="date" class="form-control"
                                            name="date_of_birth" value=""  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Date Died</label>
                                            <input type="date" class="form-control"
                                            name="date_died" value=""  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Cause of Death</label>
                                            <input type="text" class="form-control"
                                            name="cause_of_death" value=""  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Religion</label>
                                            <input type="text" class="form-control"
                                            name="religion" value=""  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"  for="">Relation to Deceased</label>
                                            <input type="text" class="form-control"
                                            name="relation_to_deceased" value=""  placeholder="Enter here..." required/>
                                           
                                        </div>
                                    </div>
                                        </div>
                                            </div>
                                                <div class="float-right">
                                                    <button type="submit" name="add-reservation" class="btn btn-custom text-white fw-bold text-uppercase">make reservation</button>
                                                </div>
                                        </div>    
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- <?php include ('includes/footer.php') ?>  -->
        <?php include ('includes/scripts.php') ?>
        <script>
function fetchCasketType(val){
        $.ajax({
        type: 'post',
        url: 'fetch-casket.php',
        data: {
        id:val
        },
        success: function (response) {
            document.getElementById("casket-type").innerHTML=response;
            
            console.log(response)
        }

    })};

function getPrice(val){
    $.ajax({
        type: 'post',
        url: 'fetch-casket-price.php',
        data: {
        id: val
        },
        success: function (response) {
            document.getElementById("price").value=response;
            console.log(response)
        }
    })};

     function checkDate(val){
         const currentDate = new Date().toISOString().slice(0, 10);
         const date = val;

          if(currentDate  >= date){
              const response = "PLEASE CHECK YOUR RESERVATION DATE!"
              alert(response);
           
        } }
        </script>
    </body>
</html>
