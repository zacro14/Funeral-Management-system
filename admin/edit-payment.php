<?php
	include 'includes/session.php';

	if(isset($_POST['btn-edit-payment'])){
		$id = $_POST['payment_id'];
        $total_amount = $_POST['total-amount'];
		$amount = $_POST['amount'];
        $balance = $_POST['balance'];

        $status = $amount == $balance ? 'FULLY PAID' : 'NOT FULLY PAID';

            $sql = "UPDATE payments SET 
					payment_amount = payment_amount + '$amount', balance = balance - '$amount', 
					status = '$status' WHERE payment_id = '$id'";
            if($conn->query($sql)){
                $_SESSION['edit-success'] = 'PAYMENT SUCCESSFUL';
            }
            else{
                $_SESSION['edit-error'] = $conn->error;
      
	      }
     
	}
	else{
		$_SESSION['edit-error'] = 'Select service to edit first';
	}

	header('location: payments.php');
?>