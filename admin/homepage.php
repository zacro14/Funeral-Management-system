<?php include 'includes/header.php' ?>
<body>

<div id="wrapper">
    <?php include 'includes/nav.php' ?>

    <!-- SIDEBAR -->

    <?php include 'includes/sidebar.php' ?>
    
    <!-- END SIDEBAR -->
    
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM reservation WHERE reservation_status = 'PENDING' AND branch_id = '".$user['branch_id']."'";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div>RESERVATIONS</div>
                                </div>
                            </div>
                        </div>
                        <a href="reservations.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM client";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div> CLIENTS</div>
                                </div>
                            </div>
                        </div>
                        <a href="view-client.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM payments ";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div>PAYMENT</div>
                                </div>
                            </div>
                        </div>
                        <a href="payments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM casket";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div>CASKET</div>
                                </div>
                            </div>
                        </div>
                        <a href="casket.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM deceased WHERE branch_id = '".$user['branch_id']."'";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div>DECEASED</div>
                                </div>
                            </div>
                        </div>
                        <a href="deceased.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM employee WHERE branch_id = '".$user['branch_id']."'";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div>EMPLOYEES</div>
                                </div>
                            </div>
                        </div>
                        <a href="view-employee.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $fetch = "SELECT * FROM casket_qty WHERE branch_id = '".$user['branch_id']."'";
                                        $query = $conn->query($fetch);
                                        echo "<div class='huge'>".$query->num_rows."</div>";
                                    ?>
                                    <div>CASKET INVENTORY</div>
                                </div>
                            </div>
                        </div>
                        <a href="view-inventory.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div
            </div>
        </div>
    </div>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>
