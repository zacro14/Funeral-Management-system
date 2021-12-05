<?php
session_start();
include 'includes/db-connection.php';

if(isset($_POST['btn-register'])){
        $client_firstname     =   $_POST['client_firstname'];
        $client_middlename    =   $_POST['client_middlename'];
        $client_lastname      =   $_POST['client_lastname'];
        $client_email         =   $_POST['client_email'];
        $client_phone         =   $_POST['client_number'];
        $client_username      =   $_POST['client_username'];
        $client_password      =   $_POST['client_password'];
        
		$pass = md5($client_password);

        $sql = "INSERT INTO client (client_firstname, client_middlename, client_lastname, client_email, client_phone, client_username, client_password, client_application_date) VALUES ('$client_firstname', '$client_middlename', '$client_lastname', '$client_email', '$client_phone', '$client_username', '$pass', NOW())";
        if($conn->query($sql)){
            $_SESSION['reg-success'] = 'You can now login to your account!';
            header("location: login-form.php");
        }
        else
        {
            $_SESSION['reg-error'] = 'Registration error.';
            header("location: register.php");
        }
	}	
	else{
		$_SESSION['reg-error'] = 'Fill up registration form first';
	}

    
?>