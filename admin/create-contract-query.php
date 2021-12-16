<?php
    require_once 'includes/session.php';

    if(isset($_POST['btn-create-contract']))
    {
        $client = $_POST['client'];
        $relation = $_POST['relation'];
        $deceased = $_POST['deceased'];
        $service = $_POST['service'];
        $casket = $_POST['casket'];
       
        $charges = $_POST['charges'];
        $amount = $_POST['partial_payment'];
        $partial_payment = $_POST['partial_payment'];
        
        $balance = $amount-$partial_payment;

        $status = $partial_payment == $amount ? 'FULLY PAID' : 'NOT FULLY PAID';
        $Y = date('Y');
        $numbers='';
        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }

        $contract_uid = 'CNTRCT'.$Y.substr(str_shuffle($numbers), 0,5);

        $insert_contract = "INSERT INTO contract 
        (contract_unique_id, relation_to_deceased, other_charges, amount, date,  client_id, service_id, deceased_id, casket_id, branch_id) 
        VALUES ('$contract_uid','$relation','$charges','$amount', NOw(),'$client','$service','$deceased', '$casket', '".$user['branch_id']."')";

        $query_contract = $conn->query($insert_contract);
        if($query_contract===true)
        {
            $insert_payment = "INSERT INTO payments (payment_amount, balance, status, contract_id, client_id, branch_id) 
            VALUES ('$partial_payment','$balance','$status','$contract_uid','$client', '".$user['branch_id']."')";

            $query_payment = $conn->query($insert_payment);
            if($query_payment===true)
            {                
                $update_deceased = "UPDATE deceased SET status = '1' WHERE deceased_id = '".$deceased."'";
                $query_deceased = $conn->query($update_deceased);
                if($query_deceased === true)
                {
                    $update_quantity = "UPDATE casket_qty SET quantity = quantity-1 WHERE casket_qty_id = '".$casket."' AND branch_id = '".$user['branch_id']."'";
                    $query_quantity = $conn->query($update_quantity);
                    if($query_quantity === true)
                    {
                        $_SESSION['add-contract-success'] = 'Contract created';
                        $_SESSION['contract_unique_id'] = $contract_uid;
                    }
                    else
                    {
                        $_SESSION['add-contract-error'] = $conn->error;
                    }
                }
                else
                {
                    $_SESSION['add-contract-error'] = $conn->error;
                }
            }
            else
            {
                $_SESSION['add-contract-error'] = $conn->error;
            }
        }
        else
        {
            $_SESSION['add-contract-error'] = $conn->error;
        }
    }
    
?>
<script>
    if(confirm("Print this contract now?"))
    {
        window.location.href="generate-contract.php?id=<?php echo $_SESSION['contract_unique_id'] ?>";
    }
    else
    {
        window.location.href="contract.php";
    }
</script>
         
    
      