<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_payment ="SELECT * FROM payments 
                        INNER JOIN contract ON contract.contract_unique_id = payments.contract_id 
                        INNER JOIN client ON client.client_id = payments.client_id  
                        INNER JOIN branches ON branches.branch_id = payments.branch_id";

        $query = $conn->query($fetch_payment);
        $row_payment = $query->fetch_assoc();

        echo json_encode($row_payment);
    }
?>