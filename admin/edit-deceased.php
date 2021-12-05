<?php
    include 'includes/session.php';
    
    if(isset($_POST['btn-edit-deceased']))
    {
        $id = $_POST['deceased_id'];
        $deceased_firstname = $_POST['deceased_firstname'];
        $deceased_middlename = $_POST['deceased_middlename'];
        $deceased_lastname = $_POST['deceased_lastname'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_died = $_POST['date_died'];
        $cause_of_death = $_POST['cause_of_death'];
        $religion = $_POST['religion'];
        $family = $_POST['family'];

        $bdate = new DateTime($date_of_birth);
        $died = new DateTime($date_died);

        $diff = $died->diff($bdate);
        
        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;
        $age = $years .' Year(s)';

        if($years === 0) {
            $age = $months .' Month(s)';
            if($months === 0) {
                $age = $days .' Day(s)';
            }
        }


        $update_deceased = "UPDATE deceased SET deceased_fname = '$deceased_firstname', deceased_mname = '$deceased_middlename', deceased_lname = '$deceased_lastname', date_of_birth = '$date_of_birth', date_died = '$date_died', age = '$age', cause_of_death = '$cause_of_death', religion = '$religion', family_id = '$family' WHERE deceased_id = '$id'";
        $query_deceased = $conn->query($update_deceased);
        if($query_deceased === true)
        {
            $_SESSION['edit-deceased-success'] = "Deceased updated";
        }
        else
        {
            $_SESSION['edit-deceased-error'] = $conn->error;
        }
    }

    header("location: deceased.php");
?>