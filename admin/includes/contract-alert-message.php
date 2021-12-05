<?php
    if(isset($_SESSION['add-contract-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-contract-error']."
            </div>
        ";
        unset($_SESSION['add-contract-error']);
    }
    if(isset($_SESSION['add-contract-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-contract-success']."
            </div>
        ";
        unset($_SESSION['add-contract-success']);
    }

?>