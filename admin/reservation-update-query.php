<?php 
 require_once ('includes/db-connection.php');
 include 'includes/session.php';
if(isset($_POST['modify-reservation'])){
    $RES_NO = $_POST['rescode'];
    $date = $_POST['reservation_date'];
    $casket_id = $_POST['casket_type'];
    $chapel_id = $_POST['chapel'];
    $service_id = $_POST['service_type'];

    $sql = "UPDATE reservation 
            SET reservation_date= $date, 
            casket_id =(SELECT casket_id FROM casket WHERE casket_id =$casket_id),
            chapel_id = (SELECT chapel_id FROM chapel WHERE chapel_id =$chapel_id)
            WHERE reservation_code ='".$RES_NO."';";
    $sql .="UPDATE casket SET service_id =(SELECT service_id FROM service WHERE service_id = $service_id)
            WHERE casket_id = $casket_id";

    if($conn->multi_query($sql) === true){
        $_SESSION['success-approved-reservation'] = "UPDATED SUCCESFULLY";
        header('location: view-reservation.php?reservation='.$RES_NO.'');
    }else{
        $_SESSION['error-approved-reservation'] = "SOMETHING WENT WRONG";
    }
   
}

?>
