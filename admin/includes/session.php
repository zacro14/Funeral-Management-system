<?php
	session_start();
	include 'db-connection.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '' && !isset($_SESSION['branch']) == '' || trim($_SESSION['branch']) == '')
    {
		header('location: index.php');
	}

	$sql = "SELECT * FROM admin LEFT JOIN branches ON admin.branch_id = branches.branch_id WHERE admin.admin_id = '".$_SESSION['admin']."' AND branches.branch_id = '".$_SESSION['branch']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>