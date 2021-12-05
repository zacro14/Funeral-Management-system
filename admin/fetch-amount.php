<?php
    sleep(1);
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select = "SELECT * FROM casket WHERE casket_id = '".$id."' ";
        $query = $conn->query($select);
        while($row = $query->fetch_assoc())
        {   
            echo '<input type="hidden" name="amount" value='.$row['amount'].'></input>';
            echo "<b><p style='font-size:45px;' class='text-center text-info'>&#8369;".$row['amount']."</p></b>";
        }
    }
    exit;
?>