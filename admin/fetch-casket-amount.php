<?php
    sleep(1);
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select = "SELECT * FROM casket WHERE casket_id = '".$id."' ";
        $query = $conn->query($select);
        $row = $query->fetch_assoc();
        
          echo json_encode($row);
    }
    exit;
?>