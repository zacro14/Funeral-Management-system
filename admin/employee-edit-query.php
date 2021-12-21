<?php
	include 'includes/session.php';

	if(isset($_POST['btn-edit-employee'])){

        $employee_Id = $_POST['employee_id'];
		$employee_Firstname = $_POST['employee_firstname'];
        $employee_Middlename = 'D.';
        $employee_Lastname = $_POST['employee_lastname'];
		$employee_Phone = $_POST['employee_phone'];
        $employee_WorkType = $_POST['work-type'];
        $employee_Branch = $_POST['branch'];

            $sql = "UPDATE employee SET employee_fname = '$employee_Firstname', 
                    employee_mname = '$employee_Middlename', employee_lname = '$employee_Lastname', contact = '$employee_Phone', 
                    work_type= (SELECT work_type_id FROM work_type WHERE work_type_id ='$employee_WorkType'),
                    branch_id=(SELECT branch_id FROM branches WHERE branch_id = '$employee_Branch')
                    WHERE employee_id = '$employee_Id' ";

            if($conn->query($sql) === true){
                $_SESSION['edit-employee-success'] = 'UPDATED SUCCESSFULLY';
            }
            else{
                $_SESSION['edit-employee-error'] = $conn->error;
	      }
	}
	else{
		$_SESSION['edit-error'] = 'Please  select employee first';
	}

	header('location: view-employee.php');
?>