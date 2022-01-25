<?php include 'includes/header.php' ?>
<body>

<div id="wrapper">
<?php include 'includes/nav.php' ?>

    <!-- SIDEBAR -->
<?php include ('includes/sidebar.php') ?>
    <!-- END SIDEBAR -->
    
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Add User</h3>
                </div>
            </div>
            <?php
                if(isset($_SESSION['add-error'])){
                    echo "
                        <div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            ".$_SESSION['add-error']. ' '."<i class='fa fa-exclamation'></i>
                        </div>
                        ";
                        unset($_SESSION['add-error']);
                }
                if(isset($_SESSION['add-success'])){
                    echo "
                        <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            ".$_SESSION['add-success']. ' '."<i class='fa fa-exclamation'></i>
                        </div>
                        ";
                        unset($_SESSION['add-success']);
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            System User
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>                                       
                                        <th>Actions</th>
                                    </thead>
                                        <?php
                                            $select_user = "SELECT * FROM admin WHERE admin_id != '".$user['admin_id']."'";
                                            $query = $conn->query($select_user);
                                            $no=1;
                                            while($row = $query->fetch_assoc()) {                                                           
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['admin_firstname']; ?></td>
                                                    <td><?php echo $row['admin_middlename']; ?></td>
                                                    <td><?php echo $row['admin_lastname']; ?></td>                                                  
                                                    <td  class="text-center">
                                                        <div class="btn-group btn-group-sm"> 
                                                            <button class="edit-casket btn btn-primary btn-sm" data-id="<?php echo $row['admin_id']; ?>" data-toggle="modal" data-target="#addUser"><i class="fa fa-edit"></i> </button>
                                                            <button class="delete-casket  btn btn-danger btn-sm" data-id="<?php echo $row['admin_id']; ?>"><i class="fa fa-trash"></i> </button>
														</div>
                                                    </td>
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
    </div>
</div>
<?php include 'includes/modals.php' ?>
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
