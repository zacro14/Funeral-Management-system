<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_deceased = "SELECT * FROM deceased LEFT JOIN client ON client.client_id = deceased.family_id WHERE deceased.deceased_id = '".$id."'";
        $query = $conn->query($fetch_deceased);
        $row_deceased = $query->fetch_assoc();

        echo json_encode($row_deceased);
    }
?>