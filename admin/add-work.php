<?php
    require_once 'includes/session.php';

    if(isset($_POST['btn-add-work']))
    {
        $type = $_POST['type'];
      
        $add_work = "INSERT INTO work_type (description) VALUES ('$type')";
        $work_query = $conn->query($add_work);
        if($work_query === true)
        {
            $_SESSION['add-work-success'] = 'Work Type added successfully';
        }
        else
        {
            $_SESSION['add-work-error'] = $service_query->error;
        }
    }
    header("location: work-type.php");
?>