<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_client = "SELECT * FROM client WHERE client_id = '".$id."'";
        $query = $conn->query($fetch_client);
        $row_client = $query->fetch_assoc();

        echo json_encode($row_client);
    }
?>