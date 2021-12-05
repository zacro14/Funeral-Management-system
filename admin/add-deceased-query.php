<?php
    include 'includes/session.php';
    
    if(isset($_POST['btn-add-deceased']))
    {
        $deceased_firstname = $_POST['deceased_firstname'];
        $deceased_middlename = $_POST['deceased_middlename'];
        $deceased_lastname = $_POST['deceased_lastname'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_died = $_POST['date_died'];
        $cause_of_death = $_POST['cause_of_death'];
        $religion = $_POST['religion'];

        $family = $_POST['family'];

        $status=0;

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


        $insert_deceased = "INSERT INTO deceased (deceased_fname, deceased_mname, deceased_lname, date_of_birth, date_died, age, cause_of_death, religion, status, added_date, family_id, branch_id) VALUES ('$deceased_firstname', '$deceased_middlename', '$deceased_lastname', '$date_of_birth', '$date_died', '$age', '$cause_of_death', '$religion', '$status', NOW(), '$family', '".$user['branch_id']."')";
        $query_deceased = $conn->query($insert_deceased);
        if($query_deceased === true)
        {
            $_SESSION['add-deceased-success'] = "Deceased added";
        }
        else
        {
            $_SESSION['add-deceased-error'] = $conn->error;
        }
    }

    header("location: deceased.php");
?>