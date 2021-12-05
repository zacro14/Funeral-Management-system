<?php
	include 'includes/session.php';

	if(isset($_POST['btn-delete-service'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM client WHERE client_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['client-delete-success'] = 'Client deleted successfully';
		}
		else{
			$_SESSION['client-delete-error'] = $conn->error;
		}
	}
	else{
		$_SESSION['client-delete-error'] = 'Select item to delete first';
	}

	header('location: view-client.php');
	
?>