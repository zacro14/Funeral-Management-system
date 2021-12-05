<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_payment = "SELECT * FROM payments LEFT JOIN contract ON contract.contract_unique_id = payments.contract_id LEFT JOIN client ON client.client_id = payments.client_id  LEFT JOIN branches ON branches.branch_id = payments.branch_id WHERE payments.payment_id = '$id'";
        $query = $conn->query($fetch_payment);
        $row_payment = $query->fetch_assoc();

        echo json_encode($row_payment);
    }
?>