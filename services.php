<?php 

include_once 'includes/db-connection.php';

$fetch_res = "SELECT * FROM  services";
$query_res = $conn->query($fetch_res);


while($res = $query_res->fetch_assoc()){
    echo $res['service_type'];
}

