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
        $STATUS = "PENDING";
        $numbers='';

        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }

        $RESERVATION_CODE = 'RES'.$Y.substr(str_shuffle($numbers), 0,5);

        $FETCH_RESERVATON = "SELECT * FROM reservation WHERE reservation_date = '$DATE' AND branch_id = $BRANCH ";
        $RESERVATION_QUERY = $conn->query($FETCH_RESERVATON);
        $rows = mysqli_num_rows($RESERVATION_QUERY);

        if($rows > 0){
            $_SESSION['error-reservation'] = 'DATE AND BRANCH IS ALREADY RESERVED! TRY ANOTHER DATE OR BRANCH!';
        }
        elseif( $CURRENT_DATE  >= $DATE  && $CASKET === '' && $PACKAGE === ''){
            $_SESSION['error-reservation'] = 'PLEASE CHECK YOUR INPUTS!';
        } else {
           // $INSERT_QUERY = "INSERT INTO reservation (reservation_code, reservation_date, reservation_status, branch_id, client_id) VALUES ('$RESERVATION_CODE', '$DATE', '$STATUS', '$BRANCH', '$CLIENT')";
            $INSERT_RESERVATION = "INSERT INTO reservation (reservation_code,reservation_date, reservation_status,branch_id, client_id, casket_id  )  VALUES('$RESERVATION_CODE','$DATE', '$STATUS' ,(SELECT branch_id FROM branches WHERE branch_id = $BRANCH),(SELECT client_id FROM client WHERE client_id  = '$CLIENT'),
            (SELECT casket_id FROM casket WHERE casket_id = '$CASKET' ))";
            if($conn->query($INSERT_RESERVATION) === true)
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