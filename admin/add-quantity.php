<?php
    include 'includes/session.php';
    
    if(isset($_POST['btn-add-quantity']))
    {
        $id = $_POST['casket_qty_id'];
        $quantity = $_POST['quantity'];
       
        $update_quantity = " UPDATE casket_qty SET quantity = quantity + '$quantity' WHERE casket_qty_id = '$id'";
        $query_quantity = $conn->query($update_quantity);
        if($query_quantity === true)
        {
            $_SESSION['add-quantity-success'] = "Quantity added";
        }
        else
        {
            $_SESSION['add-quantity-error'] = $conn->error;
        }
    }

    header("location: view-inventory.php");
?>