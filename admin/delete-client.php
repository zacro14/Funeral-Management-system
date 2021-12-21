<?php
	include 'includes/session.php';

	if(isset($_POST['btn-delete-client'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM client WHERE client_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['client-delete-success'] = 'CLIENT IS DELETED SUCCESSFULLY';
		}
		else{
			$_SESSION['client-delete-error'] = $conn->error;
		}
	}
	else{
		$_SESSION['client-delete-error'] = 'SELECT CLIENT TO DELETE FIRST';
	}

	header('location: view-client.php');
	
?>