<?php

	require_once('includes/session.php');
    if(isset($_POST['submit']))
    {
        $casket = $_POST['casket'];
        $amount = $_POST['amount'];
        $quantity = $_POST['quantity'];
        $service_id = $_POST['service'];
        
        $filename = $_FILES['file']['name'];
        $target_dir = "casketimage/";
        $target_file = $target_dir. basename($filename);

        if(!empty($casket))
        {
            for($i=0; $i<count($casket); $i++)
            {
                $casket_type = $casket[$i];
                $new_amount = $amount[$i];
                $new_quantity = $quantity[$i];
                $new_service = $service_id[$i];
                $new_image = $filename[$i];
                
               if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){

                    $insert = "INSERT INTO casket (casket_type, amount, service_id, image) VALUES ('$casket_type','$new_amount','$new_service', '$new_image')";
                    $query = $conn->query($insert);
                    if($query === true)
                    {
                        $select = "SELECT * FROM casket WHERE casket_type = '".$casket_type."'";
                        $query_casket = $conn->query($select);
                        $rows = $query_casket->fetch_assoc();

                        if($rows['casket_type'] === $casket_type)
                        {
                                $_SESSION['add-casket-success'] = 'Successfully added.';
                        
                        }
                    }
                    else
                    {
                        $_SESSION['add-casket-error'] = $conn->error;
                    }
                } 
            }
        }
    }
    header("location: add-casket.php");
?>