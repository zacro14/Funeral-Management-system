<?php
    sleep(1);
    include 'includes/session.php';

    if(isset($_POST['status']))
    {
    $status = $_POST['status'];
    
    ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      
        <thead>
             <th>#</th>
            <th>Client</th>
            <th>Casket Amount</th>
            <th>Payment Amount</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Contract</th>
            <th></th>
        </thead>
        <tbody>
        <?php
                                        
                                            // $fetch_payment = "SELECT payments.payment_id, payments.payment_amount, payments.balance, payments.status, contract.contract_unique_id, client.client_firstname, client.client_middlename, client.client_lastname, branches.branch_name, branches.branch_address FROM (((payments
                                            //     INNER JOIN client ON payments.client_id = client.client_id)
                                            //     INNER JOIN contract ON payments.payment_id = contract.contract_id)
                                            //     INNER JOIN branches ON branches.branch_id = branches.branch_id) WHERE branches.branch_id = '".$user['branch_id']."'";

                                            $fetch_payment ="SELECT * FROM payments 
                                                            INNER JOIN contract ON contract.contract_unique_id = payments.contract_id 
                                                            INNER JOIN client ON client.client_id = payments.client_id 
                                                            INNER JOIN casket ON casket.casket_id = payments.casket_id
                                                            INNER JOIN branches ON branches.branch_id = payments.branch_id
                                                            WHERE status = '$status' ";

                                            
                    
                                            $query_payments = $conn->query($fetch_payment);
                                            $no = 1;
                                            while($row_payments = $query_payments->fetch_assoc())
                                             { $status = ($row_payments['status'] == 'FULLY PAID') ? '<span class="label label-success pull-left">FULLY PAID</span>':'<span class="label label-warning pull-left">NOT FULLY PAID</span>';?>      
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td class="text-capitalize"><?php echo $row_payments['client_firstname']. ' ' . $row_payments['client_middlename']. ' ' . $row_payments['client_lastname'];?></td>
                                                    <td>&#8369; <?php echo number_format($row_payments['amount'], 2) ?></td>
                                                    <td>&#8369; <?php echo number_format($row_payments['payment_amount'], 2); ?></td>
                                                    <td>&#8369; <?php echo number_format($row_payments['balance'], 2);?> </td>
                                                    <td><?php echo $status;?> </td>
                                                    <td><button class="view btn btn-secondary btn-sm" data-id="<?php echo $row_payments['contract_unique_id']; ?>"><i class="fa fa-eye"></i> View Contract Details</button></td>
                                                    <td>
														<div class="btn-group btn-group-sm">
                                                        
                                                            <button class="edit-payment btn btn-primary btn-sm" data-id="<?php echo $row_payments['payment_id']; ?>"><i class="fa fa-edit"></i> </button>
                                                           
														</div>
													</td>
                                                </tr>

                                        <?php $no++; } ?>

                                    
        </tbody>
    </table>
</div>

<?php
    };
?>

