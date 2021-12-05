<?php
    sleep(1);
    require_once 'includes/session.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $select = "SELECT * FROM deceased WHERE deceased_id = '".$id."' ";
        $query = $conn->query($select);
        while($row = $query->fetch_assoc())
        {   
            echo "<div class='row'>";

            echo "<div class='col-md-3'>";
            echo "<label for=''>Born:</label>";
            echo "<h5>".date('M d, Y', strtotime($row['date_of_birth']))."</h5>";
            echo "</div>";

            echo "<div class='col-md-3'>"; 
            echo "<label for=''>Died:</label>";
            echo "<h5>".date('M d, Y', strtotime($row['date_died']))."</h5>";
            echo "</div>";

            
            echo "<div class='col-md-3'>"; 
            echo "<label for=''>Age:</label>";
            echo "<h5>".$row['age']."</h5>";
            echo "</div>";

            echo "<div class='col-md-3'>"; 
            echo "<label for=''>Religion:</label>";
            echo "<h5>".$row['religion']."</h5>";
            echo "</div>";
            
            echo "</div>";
        }
    }
    exit;
?>