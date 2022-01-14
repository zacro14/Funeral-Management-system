<?php
	include 'includes/session.php';

	if(isset($_POST['btn-edit-casket'])){
		$id = $_POST['casket_id'];
		$casket = $_POST['casket'];
        $amount = $_POST['amount'];
		$service_type = $_POST['package-type'];

		
        $filename = $_FILES['file']['name'];
        $target_dir = "casketimage/";
        $target_file = $target_dir. basename($filename);
      
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){

				$sql = "UPDATE casket 
						SET casket_type = '$casket', amount = '$amount', image ='$filename',
						service_id= (SELECT service_id FROM service WHERE service_id='$service_type')
						WHERE casket_id = '$id'";
				if($conn->query($sql)){
					$_SESSION['edit-casket-success'] = 'Casket update successful';
				}
				else{
					$_SESSION['edit-casket-error'] = $conn->error;
				}
		  	}else{
		
				$_SESSION['edit-casket-error'] = "Something error on image upload";
			  }
	}
	else{
		$_SESSION['edit-casket-error'] = 'Select casket to edit first';
	}

	header('location: casket.php');
?>