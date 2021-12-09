<?php 

require_once 'includes/session.php';

if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        setlocale(LC_MONETARY,"en_PH");

        $select = "SELECT * FROM casket
        WHERE casket.casket_id ='".$id."' ";
        $query = $conn->query($select);
        $has_result = mysqli_num_rows($query);

        if ($has_result > 0){
            while($row = $query->fetch_assoc()){   
                    echo number_format($row['amount'], 2) ;
            }
        } else{
            echo "0.00";
        };


    }
    exit;


?>