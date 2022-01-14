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
                            <a href="reservations.php" class="">Reservations</a>
                        </li>
                        
                        <li>
                            <a href="#" class="">Manage<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="view-client.php" class=""><i class="fa fa-eye"></i> View Client</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-user-plus"></i> Add Client</a>
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
                    <a href="casket.php" class="active"><i class="fa fa-columns fa-fw"></i> Casket</a>
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
                    <h3 class="page-header">Add Caskets</h3>
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
                            Add Casket
                        </div>
                        <div class="panel-body">
                            <form name="add_casket" id="add_casket" action="add-casket-action.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group fieldGroup">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Package Type</th>
                                                        <th>Casket Type</th>
                                                        <th>Amount</th>
                                                        <th>Images</th>
                                                        <th>Add More</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select name="service[]" id="" class="form-control" required>
                                                                    <option value="" disabled selected>-Select Package-</option>
                                                                    <?php
                                                                        $select = "SELECT * FROM service";
                                                                        $query = $conn->query($select);
                                                                        while($row = $query->fetch_assoc())
                                                                        {
                                                                            echo "<option value='".$row['service_id']."'>".$row['service'] ."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="casket[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td><input type="text" name="amount[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td><input type="file" class="form-control" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload"></td>
                                                            <td><a href="javascript:void(0)" class="btn btn-primary addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success pull-right" name="submit" id="submit" value="Submit">
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group fieldGroupCopy" style="display:none;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select name="service[]" id="" class="form-control" required>
                                                                    <option value="" disabled selected>-Select Package-</option>
                                                                    <?php
                                                                        $select = "SELECT * FROM service";
                                                                        $query = $conn->query($select);
                                                                        while($row = $query->fetch_assoc())
                                                                        {
                                                                            echo "<option value='".$row['service_id']."'>".$row['service'] ."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="casket[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td><input type="text" name="amount[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td><a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                                                        </tr>
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
        </div>
    </div>
</div>

<?php include 'includes/modals.php' ?>
<?php include 'includes/scripts.php' ?>

<script>
    $(document).ready(function(){
    //group add limit
    var maxGroup = 20;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
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
