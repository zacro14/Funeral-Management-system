<?php
	include 'includes/session.php';

	if(isset($_POST['btn-edit-payment'])){
		$id = $_POST['payment_id'];
        $total_amount = $_POST['total-amount'];
		$paidAmount = $_POST['amount'];
        $currentBalance = $_POST['balance'];

        $status = $paidAmount == $currentBalance ? 'FULLY PAID' : 'NOT FULLY PAID';

		if($total_amount >= $paidAmount AND  $currentBalance >= $paidAmount ){

            $sql = "UPDATE payments SET 
					payment_amount = payment_amount + '$paidAmount', balance = balance - $paidAmount, 
					status = '$status' WHERE payment_id = '$id'";
            if($conn->query($sql)){
                $_SESSION['edit-success'] = 'PAYMENT SUCCESSFUL';
            }
            else{
                $_SESSION['edit-error'] = $conn->error;
      
	      }
		}else{
			$_SESSION['edit-error'] = "AMOUNT SHOULD NOT GREATER THAN THE CASKET PRICE NAD BALANCE";
		}
	}
	else{
		$_SESSION['edit-error'] = 'Select service to edit first';
	}

	header('location: payments.php');
?>