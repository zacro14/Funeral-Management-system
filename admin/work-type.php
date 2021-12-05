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
                            <a href="view-employee.php" >View Employee</a>
                        </li>
                        <li>
                            <a href="add-employee.php" >Add Employee</a>
                        </li>
                        <li>
                            <a href="work-schedule.php">Work Schedule</a>
                        </li>
                        <li>
                            <a href="work-type.php" class="active">Work Type</a>
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
                    <h3 class="page-header">Work Type</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <button class="add-work btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Work Type</button>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                <?php include 'includes/work-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Work Type
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>Description</th>
                                       
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $work = "SELECT * FROM work_type";
                                            $query = $conn->query($work);
                                            $no = 1;
                                            while($row_work = $query->fetch_assoc()){ ?>      
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row_work['description'];?></td>
                                                    
                                                    <td>
														<div class="btn-group btn-group-sm">
                                                            <button class="edit-work-type btn btn-primary btn-sm" data-id="<?php echo $row_work['work_type_id']; ?>"><i class="fa fa-edit"></i> </button>
                                                            <button class="delete-work  btn btn-danger btn-sm" data-id="<?php echo $row_work['work_type_id']; ?>"><i class="fa fa-trash"></i> </button>
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
    <div class="modal fade" id="add-work">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title">Add Work Type</h5>
                </div>
                <div class="modal-body">
                    <form action="add-work.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Service">Type of Work</label>
                                    <input type="text" class="form-control" name="type" placeholder="Enter here..." required>
                                </div>
                            </div>
                            
                        <br><br><br><br><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="btn-add-work"><i class="fa fa-plus"></i> Submit</button>
                    </form>
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
    $('.add-work').click(function()
    {
        $('#add-work').modal('show');
    });

    $('.edit-work-type').click(function()
    {
       e.preventDefault();
        $('#edit-work-type').modal('show');
        fetchData(id);
    });

    
    $('.delete-work').click(function(e)
    {
        e.preventDefault();
        $('#delete-work').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });
});

function fetchData(id){
    $.ajax({
        type: 'POST',
        url: 'fetch-work.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){   
            $('.work').html(response.description);
            $('#work').val(response.description);
            $('.work-id').val(response.work_type_id);
            $('.description').val(response.description);
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
