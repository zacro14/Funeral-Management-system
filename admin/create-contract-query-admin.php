<?php
include ('includes/session.php');

if(isset($_POST['btn-create-contract'])){

//client details
$clientFirstname = $_POST['client-firstname'];
$clientMiddlename = $_POST['client-middlename'];
$clientLastname = $_POST['client-lastname'];
$clientAddress = $_POST['client-address'];
$clientContactno = $_POST['client-contact'];

//deceased details
$deceasedFirstname = $_POST['deceased_firstname'];
$deceasedMiddlename = $_POST['deceased_middlename'];
$deceasedLastname = $_POST['deceased_lastname'];
$date_of_birth = $_POST['date_of_birth'];
$date_died = $_POST['date_died'];
$cause_of_death= $_POST['cause_of_death'];
$religion = $_POST['religion'];
$relationTodeceased = $_POST['relation'];

//others
$charges = $_POST['charges'];
$partialPayment = $_POST['partial_payment'];
$chandeliers =  $_POST['chandeliers-and-vigil-equipment'];
$serviceType = $_POST['service'];
$casketType = $_POST['casket'];
$chapel = $_POST['chapel'];
$branch = $_POST['branch'];




//get casket amount
$sql_getCasketAmount = "SELECT amount  FROM casket WHERE casket_id ='$casketType'";
$res = $conn->query($sql_getCasketAmount);
while ( $result = $res->fetch_assoc()){
    $amount = $result['amount'];
};


$balance = $amount-$partialPayment;

$bdate = new DateTime($date_of_birth);
        $died = new DateTime($date_died);

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

        $status = $partialPayment == $amount ? 'FULLY PAID' : 'NOT FULLY PAID';
        $Y = date('Y');
        $numbers='';
        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }

        $ContractCode = 'CNTRCT'.$Y.substr(str_shuffle($numbers), 0,5);

    $sql_insertClient = "INSERT INTO client(client_firstname, client_middlename, client_lastname, client_phone, client_application_date)
                        VALUES('$clientFirstname','$clientMiddlename','$clientLastname', '$clientContactno', Now())";

    
    $sql_casketQuantity = "UPDATE casket_qty SET 
                            quantity = (SELECT quantity FROM casket_qty WHERE casket_id = '$casketType') - 1
                            WHERE casket_id = '".$casketType."' AND branch_id = '".$branch."'";

    if($conn->query($sql_insertClient) === true){

        $sql_clientId = $conn->insert_id;

        $sql_insertDeceased = "INSERT INTO deceased(deceased_fname, deceased_mname, deceased_lname, date_of_birth, date_died, age, cause_of_death, religion, added_date, family_id, branch_id) 
                            VALUES('$deceasedFirstname', '$deceasedMiddlename', '$deceasedLastname', 
                            '$date_of_birth', '$date_died', '$age', '$cause_of_death', '$religion', Now(),
                            (SELECT client_id FROM client WHERE client_id = '$sql_clientId'),'$branch')";


        if($conn->query($sql_insertDeceased) === true){
            //query 
            $sql_deceaseId = $conn->insert_id;
            $sql_insertContract = "INSERT INTO contract (contract_unique_id, relation_to_deceased, other_charges, amount, date, address,  client_id, service_id, deceased_id, casket_id, branch_id, chapel_id) 
                                VALUES ('$ContractCode','$relationTodeceased','$charges','$amount', Now(),'$clientAddress',
                                (SELECT client_id FROM client WHERE client_id = '$sql_clientId'),
                                (SELECT service_id FROM service WHERE service_id = '$serviceType'),
                                (SELECT deceased_id FROM deceased WHERE deceased_id =$sql_deceaseId),
                                (SELECT casket_id FROM casket WHERE casket_id = '$casketType'), 
                                (SELECT branch_id FROM branches WHERE branch_id = '$branch'),
                                (SELECT chapel_id FROM chapel WHERE chapel_id = '$chapel'))";
            if($conn->query($sql_insertContract) === true){

                $sql_insertPayment = "INSERT INTO payments (payment_amount, contract_id, balance, status, client_id, branch_id, deceased_id, casket_id, service_id) 
                                    VALUES ('$partialPayment','$ContractCode','$balance','$status', 
                                    (SELECT client_id FROM client WHERE client_id = '$sql_clientId'),
                                    (SELECT branch_id FROM branches WHERE branch_id = '$branch'),
                                    (SELECT deceased_id FROM deceased WHERE deceased_id = '$sql_deceaseId'),
                                    (SELECT casket_id FROM casket WHERE casket_id = '$casketType'),
                                    (SELECT service_id FROM service WHERE service_id = '$serviceType'))";

                    if($conn->query($sql_insertPayment) === true){

                            if($conn->query($sql_casketQuantity) === true){
                                $_SESSION['add-contract-success'] = 'CONTRACT CREATED';
                            }else{
                                $_SESSION['add-contract-error'] = "$conn-> error"; 
                            }
                    }else{
                        $_SESSION['add-contract-error'] = "$conn-> error"; 
                    }
            }else{
                $_SESSION['add-contract-error'] = $conn-> error;
            }
        }else{
            $_SESSION['add-contract-error'] = $conn-> error;
        }
    } else{
        $_SESSION['add-contract-error'] = "SOMETHING  WENT WRONG IN CLLIENT DETAILS";
    }

        

}

header('location: create-contract.php');