<?php
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $fetch_work = "SELECT * FROM work_type WHERE work_type_id = '".$id."'";
        $query = $conn->query($fetch_work);
        $row_work = $query->fetch_assoc();

        echo json_encode($row_work);
    }
?>