<?php include 'includes/header.php' ?>
<body>

<div id="wrapper">
    <?php include 'includes/nav.php' ?>

    <!-- SIDEBAR -->

    <div class="navbar-default sidebar" role="navigation" style="position: fixed; top: 0px;">
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
                                    <a href="view-client.php" class="active"><i class="fa fa-eye"></i> View Client</a>
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
                    <h3 class="page-header">Clients</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="add-client.php" class="btn btn-sm  btn-primary" ><i class="fa fa-plus fa-fw"></i> Add</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/client-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Client Data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetch_client = "SELECT * FROM client";
                                            $query_client = $conn->query($fetch_client);
                                            $no = 1;
                                            while($row_client = $query_client->fetch_assoc()){ ?>      
                                                <tr>
                                                    <td class="text-capitalize"><?php echo $row_client['client_firstname']. ' ' . $row_client['client_middlename']. ' ' . $row_client['client_lastname'];?></td>
                                                    <td><?php echo $row_client['client_email'];?></td>
                                                    <td><?php echo $row_client['client_phone'];?></td>
                                                    <td>
														<div class="btn-group btn-group-sm">
                                                            <button class="edit-client btn btn-primary btn-sm" data-id="<?php echo $row_client['client_id']; ?>"><i class="fa fa-edit"></i> </button>
                                                            <button class="delete  btn btn-danger btn-sm" data-id="<?php echo $row_client['client_id']; ?>"><i class="fa fa-trash"></i> </button>
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
    $('.edit-client').click(function(e)
    {
        e.preventDefault();
        $('#edit-client').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });

    $('.delete').click(function(e)
    {
        e.preventDefault();
        $('#delete-client').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });
});

function fetchData(id){
    $.ajax({
        type: 'POST',
        url: 'client-row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){   
            $('.client-name').html(response.client_firstname+' '+response.client_middlename+' '+response.client_lastname);
            $('.client-id').val(response.client_id);
            $('.client-email').html(response.client_email);
            $('.client-phone').html(response.client_phone);
            $('.client-datecreated').html(response.client_application_date);
            $('#client-firstname').val(response.client_firstname);
            $('#client-middlename').val(response.client_middlename);
            $('#client-lastname').val(response.client_lastname);
            $('#client-email').val(response.client_email);
            $('#client-phone').val(response.client_phone);
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
