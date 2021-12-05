<?php

	require_once('includes/session.php');
    if(isset($_POST['submit']))
    {
        $casket = $_POST['casket'];
        $quantity = $_POST['quantity'];
        $branch_id = $user['branch_id'];

        if(!empty($casket))
        {
            for($i=0; $i<count($casket); $i++)
            {
                $casket_type = $casket[$i]; 
                $new_quantity = $quantity[$i];
                
                $insert_quantity = "INSERT INTO casket_qty (quantity, casket_id, branch_id) VALUES ('$new_quantity','$casket_type','$branch_id')";
                $query_quantity = $conn->query($insert_quantity);

                if($query_quantity === true)
                {
                    $_SESSION['add-casket-success'] = 'Successs';
                }
                else{
                    $_SESSION['add-casket-error'] = $conn->error;
                }  
            }
        }
    }
    header("location: casket.php");
?>