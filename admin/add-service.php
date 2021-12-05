<?php
    require_once 'includes/session.php';

    if(isset($_POST['btn-add-service']))
    {
        $service = $_POST['service'];
      
        $add_service = "INSERT INTO service (service) VALUES ('$service')";
        $service_query = $conn->query($add_service);
        if($service_query === true)
        {
            $_SESSION['add-service-success'] = 'Service added successfully';
        }
        else
        {
            $_SESSION['add-service-error'] = $service_query->error;
        }
    }
    header("location: services.php");
?>