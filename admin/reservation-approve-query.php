<?php 
 require_once ('includes/db-connection.php');
 include 'includes/session.php';
if(isset($_POST['approved-reservation'])){
    $RES_NO = $_POST['rescode'];

    $sql = "UPDATE reservation 
    SET reservation_status = 'APPROVED' 
    WHERE reservation_code ='".$RES_NO."'";


    if($conn->query($sql) === true){
        $_SESSION['success-approved-reservation'] = "APPROVED RESERVATION";
        header('location: view-reservation.php?reservation='.$RES_NO.'');
    }else{
        $_SESSION['error-approved-reservation'] = $conn->error;
    }
   
}

?>
