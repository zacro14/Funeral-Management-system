<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_contract = "SELECT * from contract
        LEFT JOIN client ON contract.client_id = client.client_id
        LEFT JOIN deceased ON contract.deceased_id = deceased.deceased_id
        LEFT JOIN service ON contract.service_id = service.service_id
        LEFT JOIN casket ON contract.casket_id = casket.casket_id
        LEFT JOIN chapel USING(chapel_id)
        LEFT JOIN payments ON contract.contract_unique_id = payments.contract_id
        WHERE contract.contract_unique_id ='".$id."'";
        $query = $conn->query($fetch_contract);
        $row_contract = $query->fetch_assoc();

        echo json_encode($row_contract);
    }
?>