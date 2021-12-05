<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_contract = "SELECT * FROM contract LEFT JOIN client ON contract.client_id = client.client_id LEFT JOIN service ON contract.service_id = service.service_id LEFT JOIN deceased ON deceased.deceased_id = contract.deceased_id LEFT JOIN casket ON casket.casket_id = contract.casket_id LEFT JOIN payments ON payments.contract_id = contract.contract_unique_id WHERE contract.contract_unique_id = '".$id."'";
        $query = $conn->query($fetch_contract);
        $row_contract = $query->fetch_assoc();

        echo json_encode($row_contract);
    }
?>