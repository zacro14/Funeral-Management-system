<?php 
 require_once ('includes/db-connection.php');
 include 'includes/session.php';
if(isset($_POST['delete-reservation'])){
    $RES_NO = $_POST['rescode'];

    $sql = "DELETE FROM reservation 
    WHERE reservation_code ='".$RES_NO."'";

    if($conn->query($sql) === true){
        $_SESSION['success-approved-reservation'] = "DELETED SUCCESSFULLY";
        header('location: view-reservation.php?reservation='.$RES_NO.'');
    }else{
        $_SESSION['error-approved-reservation'] = "SOMETHING WENT WRONG";
    }
   
}

?>
