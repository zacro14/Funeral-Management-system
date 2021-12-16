<?php include 'includes/header.php' ?>
<?php include ('includes/db-connection.php');
     include('includes/session.php');
?>

<body>
<div id="wrapper">
    <?php include 'includes/nav.php' ?>
    <?php 
     $RES_NO = $_GET['resno'];
    
// select reservation
     $fetch_reserv = "SELECT * FROM reservation 
     INNER JOIN client ON reservation.client_id = client.client_id
     INNER JOIN casket ON reservation.casket_id = casket.casket_id
     INNER JOIN service ON casket.service_id = service.service_id
     INNER JOIN chapel ON reservation.chapel_id = chapel.chapel_id
     WHERE reservation.reservation_code =  '".$RES_NO."'";

     $query_res = $conn->query($fetch_reserv);
     $result_res = $query_res->fetch_assoc();
       
    ?>

    <?php
    // select decesed info
            $sql  = "SELECT * FROM deceased 
            INNER JOIN client ON client.client_id = deceased.family_id  
            WHERE deceased.family_id = '".$result_res['client_id']."'";

            $query_deceased = $conn->query($sql);
            $result_deseceased = $query_deceased->fetch_assoc();
    ?>
    <!-- SIDEBAR -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>
                <li>
                    <a href="homepage.php" class=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Client Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="reservations.php" class="active"><i class="fa fa-file-text"></i> Reservations</a>
                        </li>
                        
                        <li>
                            <a href="#">Manage<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="view-client.php" ><i class="fa fa-eye"></i> View Client</a>
                                </li>
                                <li>
                                    <a href="add-client.php"><i class="fa fa-user-plus"></i> Add Client</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Employee Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li>
                            <a href="view-employee.php">View Employee</a>
                        </li>
                        <li>
                            <a href="add-employee.php">Add Employee</a>
                        </li>
                        <li>
                            <a href="work-schedule.php">Work Schedule</a>
                        </li>
                        <li>
                            <a href="work-type.php" class="">Work Type</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contract.php"><i class="fa fa-edit"></i> Contract</a>
                </li>
                <li>
                    <a href="payments.php"><i class="fa fa-money"></i> Payments</a>
                </li>
                <li>
                    <a href="deceased.php" class=""><i class="fa fa-list fa-fw"></i> Deceased</a>
                </li>
                <li>
                    <a href="services.php" class=""><i class="fa fa-file fa-fw"></i> Services</a>
                </li>
                <li>
                    <a href="casket.php" class="]"><i class="fa fa-columns fa-fw"></i> Casket</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-pdf-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="reservation-report.php">Reservation</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
    
    <!-- END SIDEBAR -->
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Create Contract</h3>
                </div>
            </div>
           
            <br>
            <?php 
                   if(isset($_SESSION['add-contract-error'])){
                    echo "
                        <div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-contract-error']."
                        </div>
                    ";
                    unset($_SESSION['add-contract-error']);
                }
                if(isset($_SESSION['add-contract-success'])){
                    echo "
                        <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-check fa-lg'></i>".$_SESSION['add-contract-success']."
                        </div>
                    ";
                    unset($_SESSION['add-contract-success']);
                }
                ?>
         
            <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Contracting Party</h3></div></div>
            <form action="create-contract-query-reservation.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Client Name:</label> 
                                <input type="hidden" name ="branch" value="<?php echo $result_res['branch_id'] ?>" >
                                <input type="hidden" name ="reservation_no" value="<?php echo $result_res['reservation_code'] ?>" >
                                <input type="hidden" name="client" value="<?php echo $result_res['client_id'] ?>" >
                                <input  class="form-control text-capitalize" value="<?php echo $result_res['client_firstname'] ." ".$result_res['client_middlename'] ." ". $result_res['client_lastname']  ;  ?>" placeholder="Client Name" required>     
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Relation to Deceased:</label>
                            <input type="text" name="relation" class="form-control text-capitalize" placeholder="Relation to Deceased" value="<?php echo $result_res['relation_to_deceased'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address: </label>                 
                                    <input  class="form-control text-capitalize" name="client address" value="" placeholder="Address" >     
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Deceased Details</h3></div></div>
                <div class="row">
                    <input type="hidden" name="deceased" value="<?php echo $result_deseceased['deceased_id'] ?>" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Firstname</label>
                                            <input type="text" 
                                                    class="form-control text-capitalize"
                                                    name="deceased_firstname"  
                                                    value="<?php echo $result_deseceased['deceased_fname']; ?>"  
                                                    placeholder="Enter here..." required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Middlename</label>
                                            <input type="text" class="form-control text-capitalize"
                                            name="deceased_middlename" value="<?php echo $result_deseceased['deceased_mname']; ?>"  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lastname</label>
                                            <input type="text" class="form-control text-capitalize"
                                            name="deceased_lastname" value="<?php echo $result_deseceased['deceased_lname']; ?>"  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Date of Birth</label>
                                            <input type="date" class="form-control"
                                            name="date_of_birth" value="<?php echo $result_deseceased['date_of_birth']; ?>"  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Date Died</label>
                                            <input type="date" class="form-control"
                                            name="date_died" value="<?php echo $result_deseceased['date_died']; ?>"  placeholder="Enter here..." required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Cause of Death</label>
                                            <input type="text" class="form-control text-capitalize"
                                            name="cause_of_death" value="<?php echo $result_deseceased['cause_of_death']; ?>"  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Religion</label>
                                            <input type="text" class="form-control text-capitalize"
                                            name="religion" value="<?php echo $result_deseceased['religion']; ?>"  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Family</label>
                                            <input type="text" class="form-control text-capitalize"
                                            name="family" value="<?php echo $result_deseceased['client_firstname'] ." ".$result_deseceased['client_middlename'] ." ". $result_deseceased['client_lastname']  ;  ?>"  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                </div>
                </div>
                <hr>
                <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Other</h3></div></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Service</label>
                            <select name="service" id="service" class="form-control" onchange="fetchService(this.value);">
                                <option value="<?php echo $result_res['service_id'] ?>" selected><?php echo $result_res['service'] ?></option>
                                <?php
                                        $select = "SELECT * FROM service    ";
                                        $query = $conn->query($select);
                                        while($row = $query->fetch_assoc())
                                        {
                                            echo "<option value='".$row['service_id']."'>".$row['service']. "</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                    
                        <div class="col-md-6">
                            <label for="">Other Charges(pls. specify)</label>
                            <input type="text" name="charges" class="form-control" placeholder="Enter here...">
                        </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">Casket Type</label>
                                <div class="wait"></div>
                                <select name="casket" class="form-control" id="casket" onchange="fetchAmount(this.value);" required>
                                    <option value="<?php echo $result_res['casket_id'] ?>" selected><?php echo $result_res['casket_type'] ?></option>
                                    
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Chandeliers and Vigil Equip: </label>                 
                                            <input  class="form-control text-capitalize" name="chandeliers and vigil equipment" value="" placeholder="Chandeliers and Vigil Equip" >     
                                </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="">Chapel Viewing: </label>
                                    <div class="wait"></div>
                                    <select name="chapel" class="form-control" id="casket" ">
                                        <option value="<?php echo $result_res['chapel_id'] ?>" selected><?php echo $result_res['chapel_name']; ?></option>
                                        <?php 
                                        $fetch_chapel = "SELECT chapel_id, chapel_name FROM chapel";
                                        $query_chapel = $conn->query($fetch_chapel);
                                        
                                        while($result_chapel = $query_chapel->fetch_assoc()){ ;?>
                                        <option value="<?php echo $result_chapel['chapel_id'] ?>"> <?php echo $result_chapel['chapel_name']; ?></option>

                                      <?php  }; ?>
                                    
                                       
                                    </select> 
                                </div>
                    </div>
                </div>
                <hr>
                <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Amount</h3></div></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="amount" id="amount">
                            <input type="hidden" name='casket_amount' value="<?php echo $result_res['amount'] ?>">
                            <b><p style='font-size:45px;' class="text-center text-info">&#8369;<?php echo number_format($result_res['amount'], 2) ?></p></b>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Partial Payment</label>
                            <input type="number" name="partial_payment" class="form-control" placeholder="Enter here..." required>
                        </div>
                    </div>
                </div>
                <br><br><hr>
                <div class="form-group pull-right">
                    <a href="homepage.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary text-capitalize" name="btn-create-contract" >create contract</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/scripts.php'; ?>

<script type="text/javascript">
function fetchInfo(val)
{
    $.ajax({
        type: 'post',
        url: 'fetch-deceased-info.php',
        data: {
        id:val
        },
        beforeSend:function(){
            $(".info").html("<center><img class='' src='img/loader.gif' /></center>");
        },
        success: function (response) {
            document.getElementById("info").innerHTML=response;
        }
    });
    
}
function fetchAmount(val)
{
    $.ajax({
        type: 'post',
        url: 'fetch-amount.php',
        data: {
        id:val
        },
        beforeSend:function(){
            $(".amount").html("<center><img class='' src='img/loader.gif' /></center>");
        },
        success: function (response) {
            document.getElementById("amount").innerHTML=response; 
        }
    });
}

function fetchService(val)
{
    $.ajax({
        type: 'post',
        url: 'fetch-service-info.php',
        data: {
        id: val
        },
        beforeSend:function(){
            $(".casket").html("Loading");
        },
        success: function (response) {
            document.getElementById("casket").innerHTML=response; 
        }
    });
}


function fetchDeceased(val){
    $.ajax({
        type: 'post',
        url: 'fetch-deceasedName.php',
        data: {
            id: val
        },
        success: function(response) {
            document.getElementById("deceased").innerHTML = response;
        }
        
    })
}

</script>

 <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script> 

</body>
</html>
