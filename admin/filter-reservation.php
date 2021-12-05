<?php
    sleep(1);
    include 'includes/session.php';

    if(isset($_POST['status']))
    {
        $status = $_POST['status'];
    
        $fetch_res = "SELECT * FROM reservation LEFT JOIN client ON client.client_id = reservation.client_id LEFT JOIN branches ON branches.branch_id = reservation.branch_id WHERE reservation.reservation_status = '".$status."' AND reservation.branch_id = '".$user['branch_id']."' ORDER BY reservation.reservation_date";
        $query_res = $conn->query($fetch_res);
        $count = $query_res->num_rows;
        $no=1;
    ?>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <?php
            if($count)
            {
        ?>
        <thead>
            <th>No.</th>
            <th>Reservation Code</th>
            <th>Client Name</th>
            <th>Reservation Date</th>
            <th>Reservation Branch</th>
            <th>Reservation Status</th>
            <th>Action</th>
        <?php
            }
            else
            {
                echo "<h1 class='text-center'>No record/s found.</h1>";
            }
        ?>
        </thead>
        <tbody>
            <?php
                while($rows = $query_res->fetch_assoc()){ $status_ = ($status == 'APPROVED') ?'<span class="label label-success pull-left">APPROVED</span>':'<span class="label label-warning pull-left">PENDING</span>';?>      
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $rows['reservation_code'];?></td>
                    <td><?php echo $rows['client_firstname']. ' ' . $rows['client_middlename']. ' ' . $rows['client_lastname'];?></td>
                    <td><?php echo date('M d, Y', strtotime($rows['reservation_date']));?></td>
                    <td><?php echo $rows['branch_name'];?></td>
                    <td><?php echo $status_;?></td>
                    <td>
						<div class="btn-group btn-group-sm">
                            <?php
                                if($rows['reservation_status'] == 'APPROVED')
                                {
                                    echo '<a href="view-contract.php" class="btn btn-sm  btn-success" data-toggle="tooltip" data-placement="top" title="VIEW DETAILS"><i class="fa fa-eye fa-fw"></i></a>
                                    <a href="edit-reservation.php" class="btn btn-sm btn-outline btn-primary" data-toggle="tooltip" data-placement="top" title="EDIT"><i class="fa fa-edit fa-fw"></i></a>
                                    <a href="delete-reservation.php" class="btn btn-sm btn-outline btn-danger"><i class="fa fa-trash fa-fw"></i></a>';
                                }
                                else
                                {
                                    echo '<a href="create-contract.php" class="btn btn-sm  btn-info" data-toggle="tooltip" data-placement="top" title="CREATE CONTRACT"><i class="fa fa-file-text fa-fw"></i></a>
                                    <a href="create-contract.php" class="btn btn-sm btn-outline btn-primary" data-toggle="tooltip" data-placement="top" title="EDIT"><i class="fa fa-edit fa-fw"></i></a>';
                                }
                            ?>
						</div>
					</td>
                </tr>
                <?php $no++; } ?>
        </tbody>
    </table>
<?php
    }
?>
<?php include 'includes/scripts.php'; ?>