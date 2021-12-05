<?php
	include 'includes/session.php';

	if(isset($_POST['btn-edit-service'])){
		$id = $_POST['service_id'];
		$service = $_POST['service'];
		
		$sql = "UPDATE service SET service = '$service' WHERE service_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['service-edit-success'] = 'Service update successfull';
		}
		else{
			$_SESSION['service-edit-error'] = $conn->error;
		}

	}
	else{
		$_SESSION['service-edit-error'] = 'Select service to edit first';
	}

	header('location: services.php');
?>