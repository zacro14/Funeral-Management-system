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
                            <a href="add-employee.php">Add Employee</a>
                        </li>
                        <li>
                            <a href="work-schedule.php" class="active">Work Schedule</a>
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
                    <h3 class="page-header">Work Schedule</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="work-schedule.php" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/work-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Schedule Data
                        </div>
                        <div class="panel-body">
                            <form name="add_sched" id="add_sched" action="add-sched-action.php" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group fieldGroup">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Employee</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Branch</th>
                                                        <th>Add More</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select name="employee[]" id="" class="form-control" required>
                                                                    <option value="" disabled selected>-Select Employee-</option>
                                                                    <?php
                                                                        $select = "SELECT * FROM employee";
                                                                        $query = $conn->query($select);
                                                                        while($row = $query->fetch_assoc())
                                                                        {
                                                                            echo "<option value='".$row['employee_id']."'>".$row['employee_fname'] .' '.$row['employee_mname'] .' '.$row['employee_lname'] ."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="date" name="date[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td><input type="time" name="time[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td>
                                                                <select name="branch[]" id="" class="form-control" required>
                                                                    <option value="" disabled selected>-Select Branch-</option>
                                                                    <?php
                                                                        $select = "SELECT * FROM branches";
                                                                        $query = $conn->query($select);
                                                                        while($row = $query->fetch_assoc())
                                                                        {
                                                                            echo "<option value='".$row['branch_id']."'>".$row['branch_name'] ."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
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
                                                                <select name="employee[]" id="" class="form-control" required>
                                                                    <option value="" disabled selected>-Select Employee-</option>
                                                                    <?php
                                                                        $select = "SELECT * FROM employee";
                                                                        $query = $conn->query($select);
                                                                        while($row = $query->fetch_assoc())
                                                                        {
                                                                            echo "<option value='".$row['employee_id']."'>".$row['employee_fname'] .' '.$row['employee_mname'] .' '.$row['employee_lname'] ."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="date" name="date[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td><input type="time" name="time[]" class="form-control" placeholder="Enter here..."/></td>
                                                            <td>
                                                                <select name="branch[]" id="" class="form-control" required>
                                                                    <option value="" disabled selected>-Select Branch-</option>
                                                                    <?php
                                                                        $select = "SELECT * FROM branches";
                                                                        $query = $conn->query($select);
                                                                        while($row = $query->fetch_assoc())
                                                                        {
                                                                            echo "<option value='".$row['branch_id']."'>".$row['branch_name'] ."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
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
