<?php

	require_once('includes/session.php');
    if(isset($_POST['submit']))
    {
        $employee = $_POST['employee'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $branch = $_POST['branch'];

        if(!empty($employee))
        {
            for($i=0; $i<count($employee); $i++)
            {
                $emp = $employee[$i];
                $new_date = $date[$i];
                $new_time = $time[$i];
                $new_branch = $branch[$i];

                $insert = "INSERT INTO work_schedule (date, time, employee_id, branch_id) VALUES ('$new_date','$new_time','$emp', '$new_branch')";
                $query = $conn->query($insert);
                if($query === true)
                {
                 
                            $_SESSION['add-sched-success'] = 'Successfully added.';
                   
                }
                else
                {
                    $_SESSION['add-sched-error'] = $conn->error;
                }
            }
        }
    }
    header("location: add-schedule.php");
?>