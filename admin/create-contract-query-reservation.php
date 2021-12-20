<?php
    include 'includes/session.php';

    if(isset($_POST['btn-create-contract']))
    {
        //client 
        $client = $_POST['client'];
        $branch = $_POST['branch'];
        $relation = $_POST['relation'];
        $deceased = $_POST['deceased'];
        $service = $_POST['service'];
        $casket = $_POST['casket'];
        $res_no =$_POST['reservation_no'];
        $chapel =$_POST['chapel'];
        $client_address = $_POST['client address'];
        
        //deceased info 
        $firstname =$_POST['deceased_firstname'];
        $middlename = $_POST['deceased_middlename'];
        $lastname =  $_POST['deceased_lastname'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_died = $_POST['date_died'];
        $cause_of_death= $_POST['cause_of_death'];
        $religion = $_POST['religion'];
        $family = $_POST['family'];

       
        $charges = $_POST['charges'];
        $amount = $_POST['casket_amount'];
        $partial_payment = $_POST['partial_payment'];
        
        $balance = $amount-$partial_payment;

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

        $status = $partial_payment == $amount ? 'FULLY PAID' : 'NOT FULLY PAID';
        $Y = date('Y');
        $numbers='';
        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }

        $contract_uid = 'CNTRCT'.$Y.substr(str_shuffle($numbers), 0,5);

        $sql_contract = "INSERT INTO contract (contract_unique_id, relation_to_deceased, other_charges, amount, date,address,  client_id, service_id, deceased_id, casket_id, branch_id, chapel_id) 
                            VALUES ('$contract_uid','$relation','$charges','$amount', Now(),'$client_address',
                            (SELECT client_id FROM client WHERE client_id = '$client'),
                            (SELECT service_id FROM service WHERE service_id = '$service'),
                            (SELECT deceased_id FROM deceased WHERE deceased_id = '$deceased'), 
                            (SELECT casket_id FROM casket WHERE casket_id = '$casket'), 
                            (SELECT branch_id FROM branches WHERE branch_id = '$branch'),
                            (SELECT chapel_id FROM chapel WHERE chapel_id = '$chapel'))";

        $sql_payments = "INSERT INTO payments (payment_amount, contract_id, balance, status, client_id, branch_id, deceased_id, casket_id, service_id) 
                            VALUES ('$partial_payment','$contract_uid','$balance','$status', 
                            (SELECT client_id FROM client WHERE client_id = '$client'),
                            (SELECT branch_id FROM branches WHERE branch_id = '$branch'),
                            (SELECT deceased_id FROM deceased WHERE deceased_id = '$deceased'),
                            (SELECT casket_id FROM casket WHERE casket_id = '$casket'),
                            (SELECT service_id FROM service WHERE service_id = '$service'))";

        $sql_deceased = "UPDATE deceased 
                            SET deceased_fname = '$firstname', deceased_mname = '$middlename', deceased_lname = '$lastname', date_of_birth = '$date_of_birth',
                            date_died = '$date_died', age ='$AGE', cause_of_death ='$cause_of_death', religion='$religion', 
                            family_id = (SELECT client_id FROM client WHERE client_id = '$client'),
                            branch_id = (SELECT branch_id FROM branches WHERE branch_id = '$branch')
                            WHERE deceased_id = '".$deceased."'";

        $sql_casket =  "UPDATE casket_qty SET 
                            quantity = (SELECT quantity FROM casket_qty WHERE casket_id = '$casket') - 1
                            WHERE casket_id = '".$casket."' AND branch_id = '".$branch."'";


        if($conn->query($sql_contract) === true){
            if($conn->query($sql_payments) === true){
                if($conn->query($sql_deceased)=== true){
                    if($conn->query($sql_casket) === true){
                        $_SESSION['add-contract-success'] = 'CONTRACT CREATED';
                        $_SESSION['contract_unique_id'] = $contract_uid;
                    }else{
                        $_SESSION['add-contract-error'] = $conn->error;
                    }
                }else{
                    $_SESSION['add-contract-error'] = $conn->error;
                }

            }else{
                $_SESSION['add-contract-error'] = $conn->error;
            }   
        }
        else{
            $_SESSION['add-contract-error'] = $conn->error;
        }
    }
    header('location: approve-reservation.php?resno='.$res_no.' ');
?>
         
    
      