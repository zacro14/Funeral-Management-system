<?php
	session_start();
	include 'includes/db-connection.php';

	if(isset($_POST['btn-login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
        $branch = $_POST['branch'];
		//$pass = md5($password);
		$sql = "SELECT * FROM admin WHERE admin_username = '$username' or admin_email = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error-login'] = 'Cannot find account with the username/email';
		}
		else
        {
			$row = $query->fetch_assoc();
			if($password != $row['admin_password'])
			{
                $_SESSION['error-login'] = 'Incorrect password';
			}
			elseif($branch != $row['branch_id'])
            {
				$_SESSION['error-login'] = 'Cannot find user in that branch';
			}
            else
            {
                $_SESSION['admin'] = $row['admin_id'];
                $_SESSION['branch'] = $row['branch_id'];
            }
		}
		
	}
	else
	{
		$_SESSION['error-login'] = 'No data.';
	}

	header('location: index.php');

?>