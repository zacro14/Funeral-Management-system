<?php include 'includes/header.php' ?>
<?php include ('includes/db-connection.php');
     include('includes/session.php');
?>

<body>
<div id="wrapper">
    <?php include 'includes/nav.php' ?>
    <?php 
     $RES_NO = $_GET['reservation'];
    
// select reservation
     $fetch_reserv = "SELECT * FROM reservation 
     INNER JOIN branches USING(branch_id)
     INNER JOIN client USING(client_id)
     INNER JOIN casket USING(casket_id)
     INNER JOIN service USING(service_id)
     INNER JOIN chapel USING(chapel_id)
     
     WHERE reservation_code= '".$RES_NO."'";

     $query_res = $conn->query($fetch_reserv);
     $result_res = $query_res->fetch_assoc();

     //select chapel
       
   
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
                    <h3 class="page-header text-capitalize">reservation <b><?php echo $RES_NO ?></b></h3>
                </div>
            </div>
           
            <br>
            
            <form action="create-contract-query.php" method="POST">
                <div class ="container-fluid">
                <h3 class="text-capitalize text-center "> reservation details</h3>
                    <div class="row">
                   
                    <dl class="dl-horizontal col-sm-6">
                        <dt class="text-capitalize">reservation code</dt>
                        <dd> <?php echo $result_res['reservation_code'] ?></dd>
                        
                        <dt class="text-capitalize">reservation date</dt>
                        <dd> <?php echo $result_res['reservation_date'] ?></dd>

                        <dt class="text-capitalize">reservation status</dt>
                        <dd> <?php echo $result_res['reservation_status'] ?></dd>

                        <dt class="text-capitalize"> type of service</dt>
                        <dd> <?php echo $result_res['service'] ?></dd>

                        <dt class="text-capitalize">casket type</dt>
                        <dd><a href="casket.php?caskettype=<?php echo $result_res['casket_type'] ?>"> <?php echo $result_res['casket_type'] ?> </a></dd>

                        <dt class="text-capitalize">price</dt>
                        <dd>&#8369; <?php echo number_format($result_res['amount'], 2) ?></dd>

                        <dt class="text-capitalize">chapel viewing</dt>
                        <dd> <?php echo $result_res['chapel_name'] ?></dd>

                    </dl>

                    <dl class="dl-horizontal col-sm-6">
                        <dt class="text-capitalize"> user ID</dt>
                        <dd><a href="view-client.php?id=<?php echo $result_res['client_id'] ?>"> <?php echo $result_res['client_id'] ?> </a></dd>

                        <dt class="text-capitalize"> first name</dt>
                        <dd> <?php echo $result_res['client_firstname'] ?></dd>
                        
                        <dt class="text-capitalize">middle name</dt>
                        <dd> <?php echo $result_res['client_middlename'] ?></dd>

                        <dt class="text-capitalize">last name</dt>
                        <dd> <?php echo $result_res['client_lastname'] ?></dd>

                        <dt class="text-capitalize"> email</dt>
                        <dd> <?php echo $result_res['client_email'] ?></dd>

                        <dt class="text-capitalize">phone</dt>
                        <dd> <?php echo $result_res['client_phone'] ?></dd>

                        <dt class="text-capitalize">created</dt>
                        <dd> <?php echo $result_res['client_application_date'] ?></dd>

                    </dl>

                </div>  
                    
                </div>
                <div class="row mt-5">
                <div class="col-sm-1">
                    <button type="button" 
                        data-toggle="modal" 
                        data-target="#approvereservation" 
                        class="btn btn-primary">Approve
                    </button>
                </div>
                <div class="col-sm-1">
                    <a href="" class="btn btn-primary" data-ds-toogle="tooltip"  title="THIS WILL CANCEL THE RESERVATION"></i>Cancel</a>
                </div>
                <div class="col-sm-1">
                    <button type="button" 
                        data-toggle="modal" 
                        data-target="#delete-reservation" 
                        class="btn btn-primary">delete
                    </button>
                </div>

                <div class="col-sm-1">
                    <a href="approve-reservation.php?resno=<?php echo $RES_NO ?>" class="btn btn-primary text-capitalize" data-ds-toogle="tooltip" title="CREATE CONTRACT"></i>create contract</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php include ('includes/modal-approve-reservation.php') ?>
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
