<?php
    sleep(1);
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select = "SELECT * FROM casket WHERE service_id = '".$id."' ";
        $query = $conn->query($select);
        echo "<option selected disabled>--Select Casket Type--</option>";
        while($row = $query->fetch_assoc())
        {   
           
            echo "<option value='".$row['casket_id']."'>".$row['casket_type']."</option>";
        }
    }
    exit;
?>