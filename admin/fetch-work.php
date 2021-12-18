<?php
    include('includes/session.php') ;
    include('includes/db-connection.php');

        $fetch_work = "SELECT *  FROM work_schedule
                        INNER JOIN branches ON work_schedule.branch_id = branches.branch_id
                        INNER JOIN employee ON work_schedule.employee_id = employee.employee_id";
        
        $query = $conn->query($fetch_work);
        
        while($record = $query->fetch_assoc()) {
            $data[] =  array(
                'id'    => $record['work_schedule_id'],
                'title' => $record['employee_fname']." ".$record['employee_mname']." ".$record['employee_lname'] ,
                'start' => $record['date']." ".$record['time'],
            );
        };
        header('Content-Type: application/json');
        echo json_encode($data);
?>