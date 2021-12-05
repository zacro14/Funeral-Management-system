<?php
    include 'includes/session.php';
    
    if(isset($_POST['btn-add-employee']))
    {
        $fname = $_POST['employee_fname'];
        $mnane = $_POST['employee_mname'];
        $lname = $_POST['employee_lname'];
        $contact = $_POST['contact'];
        $branch = $user['branch_id'];
        $work = $_POST['type'];
       

        $insert_emp = "INSERT INTO employee (employee_fname, employee_mname, employee_lname, contact, branch_id, work_type) VALUES ('$fname', '$mname', '$lname', '$contact', '$branch', '$work')";
        $query_emp = $conn->query($insert_emp);
        if($query_emp === true)
        {
            $_SESSION['add-employee-success'] = "Employee successfully added";
        }
        else
        {
            $_SESSION['add-employee-error'] = $conn->error;
        }
    }

    header("location: add-employee.php");
?>