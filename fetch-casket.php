<?php 

require_once 'includes/session.php';

if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select = "SELECT * FROM casket
        INNER JOIN service using(service_id)
        WHERE service.service_id ='".$id."' ";
        $query = $conn->query($select);
        while($row = $query->fetch_assoc())
        {   
         echo "<option value='".$row['casket_id']."'>".$row['casket_type']."-  &#8369;".$row['amount'].""."</option>";
        }
    
    }
    exit;


?>