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
                    <a href="deceased.php" class=""><i class="fa fa-list fa-fw"></i> Deceased</a>
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
                    <h3 class="page-header">Reservations</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>-Filter by Status-</option>
                            <option value="APPROVED" >APPROVED</option>
                            <option value="PENDING" >PENDING</option>
                            <option value="CANCELED" >CANCELED</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10 text-right">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <!--<select name="status" id="status" class="form-control">
                                    <option value="" disabled selected>-Print by Status-</option>
                                    <option value="APPROVED" >APPROVED</option>
                                    <option value="PENDING" >PENDING</option>
                                </select>
                                <span class="input-group-btn">
                                    <a href="print-filter-res.php" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Print by status selected."><i class="fa fa-print"></i> Print</a>
                                    <a href="print-res.php" class="btn btn-primary" target="_blank" data-toggle="tooltip" data-placement="top" title="Print all data."><i class="fa fa-print"></i> PRINT ALL</a>
                                </span> --> 
                                <a href="print-res.php" class="btn btn-primary" target="_blank" data-toggle="tooltip" data-placement="top" title="Print all data."><i class="fa fa-print"></i> PRINT ALL</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reservations Data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>No.</th>
                                        <th>Reservation Code</th>
                                        <th>Client Name</th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Branch</th>
                                        <th>Reservation Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetch_res = "SELECT * FROM reservation 
                                            LEFT JOIN client ON client.client_id = reservation.client_id 
                                            LEFT JOIN branches ON branches.branch_id = reservation.branch_id
                                            WHERE reservation_status = 'PENDING'
                                            ORDER BY reservation.reservation_date AND reservation.reservation_status ='PENDING' DESC";
                                            $query_res = $conn->query($fetch_res);
                                            $no = 1;
                                            while($row_res = $query_res->fetch_assoc())
                                            {  
                                                if($row_res['reservation_status'] === 'APPROVED'){
                                                    $status = '<span class="label label-success">APPROVED</span>';
                                                } elseif( $row_res['reservation_status'] === 'CANCELED'){
                                                    $status = '<span class="label label-danger">CANCELED</span>';
                                                } else{
                                                    $status = '<span class="label label-warning">PENDING</span>';
                                                }
                                                ?>      
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><a href="view-reservation.php?reservation=<?php echo $row_res['reservation_code'];?> "><?php echo $row_res['reservation_code'] ?> </a></td>
                                                    <td><a class="text-capitalize" href="view-client.php?client=<?php echo $row_res['client_id'];?>"><?php echo $row_res['client_firstname']. ' ' . $row_res['client_middlename']. ' ' . $row_res['client_lastname'];?></td>
                                                    <td><?php echo date('M d, Y', strtotime($row_res['reservation_date']));?></td>
                                                    <td><?php echo $row_res['branch_name'];?></td>
                                                    <td class="text-center"><?php echo $status;?></td>
                                                    <!-- <td class ="text-center">
														<div class="btn-group btn-group-sm">
                                                            <?php
                                                                if($row_res['reservation_status'] == 'APPROVED')
                                                                {
                                                                    echo '<a href="view-reservation.php?reservation='.$row_res['reservation_code'].'" class="btn btn-sm  btn-success" data-toggle="tooltip" data-placement="top" title="VIEW DETAILS"><i class="fa fa-eye fa-fw"></i></a>';
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<a href="approve-reservation.php?resno='. $row_res['reservation_code']. '" class="btn btn-sm  btn-info" data-toggle="tooltip" data-placement="top" title="APPROVE RESERVATION"><i class="fa fa-check fa-fw"></i></a>';
                                                                    
                                                                }
                                                            ?>
                                                            <!-- <a href="cancel-reservation.php" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="CANCEL RESERVATION"><i class="fa fa-times fa-fw"></i></a> -->
                                                            <!-- <a href="delete-reservation.php" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i></a>'; -->
														</div>
													</td> 
                                                </tr>


                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/scripts.php' ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#status").on('change', function(){
            var value = $(this).val();
            //alert(value);

            $.ajax({
                url: "filter-reservation.php",
                type: "POST",
                data: "status=" + value,
                beforeSend:function(){
                    $(".panel-body").html("<center><img class='' src='img/loader.gif' /></center>");
                },
                success:function(data){
                    $(".panel-body").html(data);
                }
            });
        });
    });
</script>
</body>
</html>
