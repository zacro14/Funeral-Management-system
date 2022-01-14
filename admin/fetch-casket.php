<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_casket = "SELECT * FROM casket 
                        LEFT JOIN casket_qty ON casket.casket_id = casket_qty.casket_id 
                        LEFT JOIN service ON service.service_id = casket.service_id 
                        WHERE casket.casket_id = '".$id."'";
                        
        $query = $conn->query($fetch_casket);
        $row_casket = $query->fetch_assoc();

        echo json_encode($row_casket);
    }
?>