<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_contract = "SELECT * from (((((contract
        INNER JOIN payments ON contract.payment_id = payments.payment_id )
        INNER JOIN client ON contract.client_id = client.client_id)
        INNER JOIN deceased ON contract.deceased_id = deceased.deceased_id)
        INNER JOIN service ON contract.service_id = service.service_id)
        INNER JOIN casket ON contract.casket_id = casket.casket_id)
        WHERE contract.contract_unique_id ='".$id."'";
        $query = $conn->query($fetch_contract);
        $row_contract = $query->fetch_assoc();

        echo json_encode($row_contract);
    }
?>