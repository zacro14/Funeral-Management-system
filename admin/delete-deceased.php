<?php
	include 'includes/session.php';

	if(isset($_POST['btn-delete-deceased'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM deceased WHERE deceased_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['delete-deceased-success'] = 'Deceased deleted successfully';
		}
		else{
			$_SESSION['delete-deceased-error'] = $conn->error;
		}
	}
	else{
		$_SESSION['delete-deceased-error'] = 'Select item to delete first';
	}

	header('location: deceased.php');
	
?>