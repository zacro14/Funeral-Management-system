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
                    <a href="homepage.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                            <a href="view-employee.php" class="active">View Employee</a>
                        </li>
                        <li>
                            <a href="add-employee.php">Add Employee</a>
                        </li>
                        <li>
                            <a href="work-schedule.php">Work Schedule</a>
                        </li>
                        <li>
                            <a href="work-type.php">Work Type</a>
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
                    <h3 class="page-header">Employee</h3>
                </div>
            </div>
                    
            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/client-alert-message.php';
                            include ('includes/employee-alert-message.php');
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employee Data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                       
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetch_emp = "SELECT * FROM employee WHERE branch_id = '".$user['branch_id']."'";
                                            $query_emp = $conn->query($fetch_emp);
                                            $no = 1;
                                            while($row_emp = $query_emp->fetch_assoc()){ ?>      
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row_emp['employee_fname']. ' ' . $row_emp['employee_mname']. ' ' . $row_emp['employee_lname'];?></td>
                                                    <td><?php echo $row_emp['contact'];?></td>
                                                    <td>
														<div class="btn-group btn-group-sm">
                                                            <button class="edit-employee btn btn-primary btn-sm" data-id="<?php echo $row_emp['employee_id']; ?>"><i class="fa fa-edit"></i> </button>
                                                            <button class="delete-employee  btn btn-danger btn-sm" data-id="<?php echo $row_emp['employee_id']; ?>"><i class="fa fa-trash"></i> </button>
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

<?php 
    include ('includes/modal-employee.php');
    include 'includes/scripts.php';
?>

<script>

$('.edit-employee').click(function(e)
    {
        e.preventDefault();
        $('#edit-employee').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });


$('.delete-employee').click(function(e)
    {
        e.preventDefault();
        $('#delete-employee').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });


function fetchData(id){
    $.ajax({
        type: 'POST',
        url: 'fetch-employee.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){ 
            console.log(response); 
            $('.employee-name').html(response.employee_fname+' '+ response.employee_mname+' '+ response.employee_lname);
            $('#employee-firstname').val(response.employee_fname);
            $('#employee-middlename').val(response.employee_mname);
            $('#employee-lastname').val(response.employee_lname);
            $('#employee-phone').val(response.contact);
            $('#employee-id').val(response.employee_id);
            $('.branch-id').val(response.branch_id);
            
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
