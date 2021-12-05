<?php
    require_once 'includes/session.php';

    if(isset($_POST['btn-edit']))
    {
        $client_id = $_POST['client_id'];
        $client_firstname = $_POST['client_firstname'];
        $client_middlename = $_POST['client_middlename'];
        $client_lastname = $_POST['client_lastname'];
        $client_email = $_POST['client_email'];
        $client_phone = $_POST['client_phone'];

        $update = "UPDATE client SET client_firstname = '$client_firstname', client_middlename = '$client_middlename', client_lastname = '$client_lastname', client_email = '$client_email', client_phone = '$client_phone' WHERE client_id = '$client_id'";
        $query = $conn->query($update);

        if($query === true)
        {
            $_SESSION['client-edit-success'] = 'Client update successful';
        }
        else
        {
            $_SESSION['client-edit-error'] = $conn->error;
        }

    }
    header("location: view-client.php");
?>