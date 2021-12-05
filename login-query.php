<?php
	session_start();
	include 'includes/db-connection.php';

	if(isset($_POST['btn-login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$pass = md5($password);
		$sql = "SELECT * FROM client WHERE client_username = '$username' or client_email = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username/email';
		}
		else{
			$row = $query->fetch_assoc();
			if($pass == $row['client_password']){
				$_SESSION['client'] = $row['client_id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'No data.';
	}

	header('location: login-form.php');

?>