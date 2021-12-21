<?php
    include('includes/session.php') ;
    include('includes/db-connection.php');

    if(isset($_POST['id'])){
        
        $id = $_POST['id'];

        $fetch_work = "SELECT *  FROM employee WHERE employee_id= ".$id." ";
        
        $query = $conn->query($fetch_work);
        
        $record = $query->fetch_assoc();
           
     
        header('Content-Type: application/json');
        echo json_encode($record);
    }
?>

