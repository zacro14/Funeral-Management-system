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
                    <h3 class="page-header">Deceased</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="add-deceased.php" class="btn btn-sm  btn-primary" ><i class="fa fa-plus fa-fw"></i> Add</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/deceased-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Deceased Data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Family</th>
                                        <th>Date of Birth</th>
                                        <th>Date Died</th>
                                        <th>Cause of Death</th>
                                        <th>Age</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $deceased = "SELECT * FROM deceased LEFT JOIN client ON client.client_id = deceased.family_id LEFT JOIN branches ON branches.branch_id = deceased.branch_id WHERE branches.branch_id = '".$user['branch_id']."'";
                                            $deceased_query = $conn->query($deceased);
                                            $no=1;
                                            while($row_deceased = $deceased_query->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row_deceased['deceased_fname'] . ' ' . $row_deceased['deceased_mname'] . ' ' . $row_deceased['deceased_lname']; ?></td>
                                                    <td><?php echo $row_deceased['client_firstname'] . ' ' . $row_deceased['client_middlename'] . ' ' . $row_deceased['client_lastname']; ?></td>
                                                    <td><?php echo date('M d, Y', strtotime($row_deceased['date_of_birth'])); ?></td>
                                                    <td><?php echo date('M d, Y', strtotime($row_deceased['date_died'])); ?></td>
                                                    <td><?php echo $row_deceased['cause_of_death']; ?></td>
                                                    <td><?php echo $row_deceased['age']; ?></td>
                                                    <td>
														<div class="btn-group btn-group-sm">
                                                            <button class="edit-deceased btn btn-primary btn-sm" data-id="<?php echo $row_deceased['deceased_id']; ?>"><i class="fa fa-edit"></i> </button>
                                                            <!--
                                                            <button class="delete-deceased  btn btn-danger btn-sm" data-id="<?php echo $row_deceased['deceased_id']; ?>"><i class="fa fa-trash"></i> </button> -->
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
<?php include 'includes/modals.php' ?>
<?php include 'includes/scripts.php' ?>

<script>
$(function(){
   
    $('.edit-deceased').click(function(e)
    {
        e.preventDefault();
        $('#edit-deceased').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });

    $('.delete-deceased').click(function(e)
    {
        e.preventDefault();
        $('#delete-deceased').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });
});

function fetchData(id){
    $.ajax({
        type: 'POST',
        url: 'fetch-deceased.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){   
            $('.deceased').html(response.deceased_fname+' '+response.deceased_mname+' '+response.deceased_lname);
            $('.deceased-id').val(response.deceased_id);
            $('#deceased-fname').val(response.deceased_fname);
            $('#deceased-mname').val(response.deceased_mname);
            $('#deceased-lname').val(response.deceased_lname);
            $('#deceased-dob').val(response.date_of_birth);
            $('#deceased-dd').val(response.date_died);
            $('#deceased-cod').val(response.cause_of_death);
            $('#religion').val(response.religion);
            $('.family').val(response.client_id);
            $('#family').html(response.client_firstname+' '+response.client_middlename+' '+response.client_lastname);
        }
    });
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
