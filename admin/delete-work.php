<?php
	include 'includes/session.php';

	if(isset($_POST['btn-delete-work'])){
		$id = $_POST['work_id'];
		$sql = "DELETE FROM work_type WHERE work_type_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['delete-work-success'] = 'Work Type deleted successfully';
		}
		else{
			$_SESSION['delete-work-error'] = $conn->error;
		}
	}
	else{
		$_SESSION['delete-work-error'] = 'Select item to delete first';
	}

	header('location: work-type.php');
	
?>