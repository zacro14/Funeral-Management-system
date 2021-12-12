<?php
    include 'includes/session.php';

    $Y = date('Y');

    if(isset($_POST['add-reservation']))
    {
        $BRANCH = $_POST['branch'];
        $DATE = $_POST['date'];
        $CLIENT = $_POST['client'];
        $CASKET = $_POST['casket'];
        $PACKAGE = $_POST['package'];
        $CURRENT_DATE = date('Y-m-d');
        $CHAPEL =$_POST['chapel'];
        $STATUS = "PENDING";

        //deceased info
        $DECEASED_FIRSTNAME =  $_POST['deceased_firstname'];
        $DECEASED_MIDDLENAME =  $_POST['deceased_middlename'];
        $DECEASED_LASTNAME =  $_POST['deceased_lastname'];
        $DECEASED_DATEOFBIRTH =  $_POST['date_of_birth'];
        $DECEASED_DATEDIED =  $_POST['date_died'];
        $DECEASED_CAUSEOFDEATH =  $_POST['cause_of_death'];
        $DECEASED_RELIGION =  $_POST['religion'];
        $DECEASED_RELATIONTODEACEASED =  $_POST['relation_to_deceased'];


        $bdate = new DateTime($DECEASED_DATEOFBIRTH);
        $died = new DateTime($DECEASED_DATEDIED);

        $diff = $died->diff($bdate);
        
        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;
        $AGE = $years .' Year(s)';

        if($years === 0) {
            $age = $months .' Month(s)';
            if($months === 0) {
                $age = $days .' Day(s)';
            }
        }


        $numbers='';

        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }

        $RESERVATION_CODE = 'RES'.$Y.substr(str_shuffle($numbers), 0,5);
        $STATUS_APPROVE = 'APPROVED';

        $FETCH_RESERVATON = "SELECT * FROM reservation WHERE reservation_date = '$DATE' AND branch_id = $BRANCH AND reservation_status = '$STATUS_APPROVE'";
        $RESERVATION_QUERY = $conn->query($FETCH_RESERVATON);
        $rows = mysqli_num_rows($RESERVATION_QUERY);

        if($rows > 0){
            $_SESSION['error-reservation'] = 'DATE AND BRANCH IS ALREADY RESERVED! TRY ANOTHER DATE OR BRANCH!';
        }
        else {
           // $INSERT_QUERY = "INSERT INTO reservation (reservation_code, reservation_date, reservation_status, branch_id, client_id) VALUES ('$RESERVATION_CODE', '$DATE', '$STATUS', '$BRANCH', '$CLIENT')";
            $INSERT_RESERVATION = "INSERT INTO reservation (reservation_code,reservation_date, reservation_status, relation_to_deceased,branch_id, client_id, casket_id, chapel_id  )  
            VALUES('$RESERVATION_CODE','$DATE', '$STATUS', '$DECEASED_RELATIONTODEACEASED',
            (SELECT branch_id FROM branches WHERE branch_id = '$BRANCH'),
            (SELECT client_id FROM client WHERE client_id  = '$CLIENT'),
            (SELECT casket_id FROM casket WHERE casket_id = '$CASKET' ),
            (SELECT chapel_id FROM chapel WHERE chapel_id = '$CHAPEL' )); ";

            // insert into deaceased table
               $INSERT_RESERVATION .= "INSERT INTO deceased 
                   (deceased_fname, deceased_mname, deceased_lname, date_of_birth, date_died, age, cause_of_death, religion, added_date, family_id, branch_id) 
                   VALUES ('$DECEASED_FIRSTNAME', '$DECEASED_MIDDLENAME', '$DECEASED_LASTNAME', 
                   '$DECEASED_DATEOFBIRTH', '$DECEASED_DATEDIED', '$AGE', '$DECEASED_CAUSEOFDEATH', 
                   '$DECEASED_RELIGION', NOW(), 
                    (SELECT client_id FROM client WHERE client_id  = '$CLIENT'),
                    (SELECT branch_id FROM branches WHERE branch_id = $BRANCH))  ";


            if($conn->multi_query($INSERT_RESERVATION) === true)
            {   
                $_SESSION['success-reservation'] = 'YOUR RESERVATION HAS BEEN SUCCESSFULLY PROCESSED!';
            }
            else
            {
                $_SESSION['error-reservation'] = $conn->error;
            }
        }
    }

    header("location: homepage.php");
?>