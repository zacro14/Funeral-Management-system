<?php
    include 'includes/session.php';

    $Y = date('Y');

    if(isset($_POST['add-reservation']))
    {
        $BRANCH = $_POST['branch'];
        $DATE = $_POST['date'];
        $CLIENT = $_POST['client'];
        $numbers='';
        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }

        $RESERVATION_CODE = 'RES'.$Y.substr(str_shuffle($numbers), 0,5);

        $FETCH_RESERVATON = "SELECT * FROM reservation WHERE reservation_date = $DATE AND branch_id = $BRANCH ";
        $RESERVATION_QUERY = $conn->query($FETCH_RESERVATON);
        if($RESERVATION_QUERY === true)
        {
            $_SESSION['error-reservation'] = 'DATE AND BRANCH IS ALREADY RESERVED! TRY ANOTHER DATE OR BRANCH!';
        }
        else
        {
            $INSERT_QUERY = "INSERT INTO reservation (reservation_code, reservation_date, reservation_status, branch_id, client_id) VALUES ('$RESERVATION_CODE', '$DATE', 'PENDING', '$BRANCH', '$CLIENT')";
            if($conn->query($INSERT_QUERY) === true)
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