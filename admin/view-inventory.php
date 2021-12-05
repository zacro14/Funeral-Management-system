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
                    <h3 class="page-header">View</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <a href="casket.php" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/casket-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Caskets
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>Casket Type</th>
                                        <th>Quantity</th>
                                    </thead>
                                        <?php
                                            $select_casket = "SELECT * FROM casket LEFT JOIN service ON service.service_id = casket.service_id LEFT JOIN casket_qty ON casket_qty.casket_id = casket.casket_id LEFT JOIN branches ON branches.branch_id = casket_qty.branch_id WHERE branches.branch_id = '".$user['branch_id']."'";
                                            $query = $conn->query($select_casket);
                                            $no=1;
                                            while($row = $query->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['casket_type']; ?></td>
                                                    <td><?php echo $row['quantity']; ?> <button class="add-quantity btn btn-secondary btn-sm pull-right" data-id="<?php echo $row['casket_qty_id']; ?>"><i class="fa fa-edit"></i> </button></td>
                                                </tr>
                                             <?php $no++; }
                                        ?>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-quantity">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title">ADD QUANTITY - <b><span class="casket"></span></b></h5>
                </div>
                <div class="modal-body">
                    <form action="add-quantity.php" method="POST">
                        <input type="hidden" class="casket-qty-id" name="casket_qty_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" placeholder="Enter here..." required>
                                </div>
                            </div>
                            
                        <br><br><br><br><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="btn-add-quantity"><i class="fa fa-plus"></i> Submit</button>
                    </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
   
<?php include 'includes/scripts.php' ?>

<script>
$(function(){
    $('.add-quantity').click(function(e)
    {
        e.preventDefault();
        $('#add-quantity').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });

    $('.edit-casket').click(function(e)
    {
        e.preventDefault();
        $('#edit-casket').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });

    $('.delete-casket').click(function(e)
    {
        e.preventDefault();
        $('#delete-casket').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });
});

function fetchData(id){
    $.ajax({
        type: 'POST',
        url: 'fetch-casket.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){   
            $('.casket').html(response.casket_type);
            $('.casket-qty-id').val(response.casket_qty_id);
            $('.casket-id').val(response.casket_id);
            $('#casket').val(response.casket_type);
            $('#amount').val(response.amount);
            
        }
    });
}

</script>
</body>
</html>
