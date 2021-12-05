<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_service = "SELECT * FROM service LEFT JOIN casket ON casket.service_id = service.service_id WHERE service.service_id = '".$id."'";
        $query = $conn->query($fetch_service);
        $row_service = $query->fetch_assoc();

        echo json_encode($row_service);
    }
?>