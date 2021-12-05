<?php
	include 'includes/session.php';

	if(isset($_POST['btn-delete-casket'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM casket WHERE casket_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['delete-casket-success'] = 'Casket deleted successfully';
		}
		else{
			$_SESSION['delete-casket-error'] = $conn->error;
		}
	}
	else{
		$_SESSION['delete-casket-error'] = 'Select item to delete first';
	}

	header('location: casket.php');
	
?>