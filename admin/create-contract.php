<?php include 'includes/header.php' ?>
<body>

<div id="wrapper">
    <?php include 'includes/nav.php' ?>

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
                            <a href="reservations.php"><i class="fa fa-file-text"></i> Reservations</a>
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
                    <a href="contract.php" class="active"><i class="fa fa-edit"></i> Contract</a>
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
            <div class="row">
                <div class="col-md-5">
                    <a href="contract.php" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
                
            </div>
            <br>
            <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Contracting Party</h3></div></div>
            <form action="create-contract-query.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Client Name:</label>
                            <select name="client" id="" class="form-control" onchange="fetchDeceased(this.value)" required>
                                <option value="" disabled selected>-Select Client-</option>
                                <?php
                                    $select_client = "SELECT * FROM client";
                                    $query = $conn->query($select_client);
                                    while($row_client = $query->fetch_assoc())
                                    {
                                        echo "<option value='".$row_client['client_id']."'>".$row_client['client_firstname']. ' ' . $row_client['client_middlename']. ' ' .$row_client['client_lastname']. ' ' ."</option>";

                                    }
                                   
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Relation to Deceased:</label>
                            <input type="text" name="relation" class="form-control" placeholder="Enter here..." required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Deceased Details</h3></div></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Deceased Name:</label>
                            <select name="deceased" id="deceased" class="form-control" onchange="fetchInfo(this.value);" required>
                                <option value="" selected>-Select Deceased-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group info" id="info">
                            <h5 class="text-center text-info">Deceased details will appear here...</h5>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Other</h3></div></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Service</label>
                            <select name="service" id="" class="form-control" onchange="fetchService(this.value);" required>
                                <option value="" selected>-Select Service-</option>
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
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Other Charges(pls. specify)</label>
                            <input type="text" name="charges" class="form-control" placeholder="Enter here..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="">Casket Type</label>
                            <div class="wait"></div>
                            <select name="casket" class="form-control" id="casket" onchange="fetchAmount(this.value);">
                                <option value="" selected>--Select Casket Type--</option>
                            </select> 
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row"><div class="col-lg-12"><h3 class=" text-primary">Amount</h3></div></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="amount" id="amount">
                            <b><p style='font-size:45px;' class="text-center text-info">&#8369;0.00</p></b>
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
                    <button type="submit" class="btn btn-primary" name="btn-create-contract" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/scripts.php' ?>

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
