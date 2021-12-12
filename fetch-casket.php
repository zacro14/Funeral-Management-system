<?php 

require_once 'includes/session.php';

if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select = "SELECT * FROM casket
        INNER JOIN service USING(service_id)
        WHERE service.service_id ='".$id."' ";
        $query = $conn->query($select);
        $has_result = mysqli_num_rows($query);
        echo "<option selected disabled>-- Select Package --</option>";
        if ($has_result > 0){
            while($row = $query->fetch_assoc()){   
                    echo "<option value='".$row['casket_id']."'>".$row['casket_type']."</option>";
            }
        } else{
            echo "-- Select Package --";
        };


    }
    exit;


?>