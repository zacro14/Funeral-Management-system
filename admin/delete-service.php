<?php
	include 'includes/session.php';

	if(isset($_POST['btn-delete-service'])){
		$id = $_POST['service_id'];
		$sql = "DELETE FROM service WHERE service_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['service-delete-success'] = 'Service deleted successfully';
		}
		else{
			$_SESSION['service-delete-error'] = $conn->error;
		}
	}
	else{
		$_SESSION['service-delete-error'] = 'Select item to delete first';
	}

	header('location: services.php');
	
?>