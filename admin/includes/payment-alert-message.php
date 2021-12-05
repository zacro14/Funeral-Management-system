<?php
   

    if(isset($_SESSION['edit-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['edit-success']."
            </div>
        ";
        unset($_SESSION['edit-success']);
    }

    if(isset($_SESSION['edit-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['edit-error']."
            </div>
        ";
        unset($_SESSION['edit-error']);
    }

    
?>