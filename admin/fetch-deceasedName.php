<?php
    sleep(1);
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select_deceased = "SELECT *
        FROM deceased
        INNER JOIN client ON deceased.family_id = client.client_id WHERE deceased.family_id = '".$id."' ";
        $query = $conn->query($select_deceased); 
        echo "<option selected disabled>--Select Deceased--</option>";       
        while($row_deceased = $query->fetch_assoc())
        {
            echo "<option value='".$row_deceased['deceased_id']."'>".$row_deceased['deceased_fname']. ' ' . $row_deceased['deceased_mname']. ' ' .$row_deceased['deceased_lname']. ' ' ."</option>";
        }
    }
    exit;
?>