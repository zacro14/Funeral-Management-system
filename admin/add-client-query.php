<?php
    include 'includes/session.php';
    
    if(isset($_POST['btn-add-client']))
    {
        $client_firstname = $_POST['client_firstname'];
        $client_middlename = $_POST['client_middlename'];
        $aclient_lastname = $_POST['aclient_lastname'];
        $client_email = $_POST['client_email'];
        $client_contact = $_POST['client_contact'];
        $client_username = $_POST['client_lastname'];
        $client_password = $_POST['client_lastname'];

        $pass = md5($client_password);
       

        $insert_client = "INSERT INTO client (client_firstname, client_middlename, client_lastname, client_email, client_phone, client_username, client_password) VALUES ('$client_firstname', '$client_middlename', '$client_lastname', '$client_email', '$client_contact', '$client_username', '$pass')";
        $query_client = $conn->query($insert_client);
        if($query_client === true)
        {
            $_SESSION['add-client-success'] = "Client successfully added";
        }
        else
        {
            $_SESSION['add-client-error'] = $conn->error;
        }
    }

    header("location: add-client.php");
?>