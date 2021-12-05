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
                    <a href="#"><i class="fa fa-users fa-fw" class=""> </i> Client Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="reservations.php"><i class="fa fa-file-text"></i> Reservations</a>
                        </li>
                        <li>
                            <a href="contract.php"><i class="fa fa-edit"></i> Contract</a>
                        </li>
                        <li>
                            <a href="#">Manage<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="view-client.php"><i class="fa fa-eye"></i> View Client</a>
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
                    <a href="deceased.php" class="active"><i class="fa fa-list fa-fw"></i> Deceased</a>
                </li>
                <li>
                    <a href="services.php" class=""><i class="fa fa-file fa-fw"></i> Services</a>
                </li>
                <li>
                    <a href="casket.php" class=""><i class="fa fa-columns fa-fw"></i> Casket</a>
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
                    <h3 class="page-header">Add Deceased</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <a href="deceased.php" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                <?php include 'includes/client-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Deceased
                        </div>
                        <div class="panel-body">
                            <form action="add-deceased-query.php" method="POST">
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
                                            name="religion" value=""  placeholder="Enter here..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Family</label>
                                            <select name="family" id="" class="form-control" required>
                                                <option value="" disabled selected>-Select Family-</option>
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
                                </div>
                                <div class="form-group pull-right">
                                    <a href="homepage.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="btn-add-deceased">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/scripts.php' ?>

<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
</body>
</html>
