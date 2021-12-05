<?php
	include 'includes/session.php';

	if(isset($_POST['btn-edit-casket'])){
		$id = $_POST['casket_id'];
		$casket = $_POST['casket'];
        $amount = $_POST['amount'];
		
		$sql = "UPDATE casket SET casket_type = '$casket', amount = '$amount' WHERE casket_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['edit-casket-success'] = 'Casket update successfull';
		}
		else{
			$_SESSION['edit-casket-error'] = $conn->error;
		}

	}
	else{
		$_SESSION['edit-casket-error'] = 'Select casket to edit first';
	}

	header('location: casket.php');
?>