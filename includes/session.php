<?php
	session_start();
	include 'db-connection.php';

	if(!isset($_SESSION['client']) || trim($_SESSION['client']) == ''){
		header('location: login-form.php');
	}

	$sql = "SELECT * FROM client WHERE client_id = '".$_SESSION['client']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>