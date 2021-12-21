<?php
    if(isset($_SESSION['add-employee-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-employee-error']."
            </div>
        ";
        unset($_SESSION['add-employee-error']);
    }
    if(isset($_SESSION['add-employee-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-employee-success']."
            </div>
        ";
        unset($_SESSION['add-employee-success']);
    }

    if(isset($_SESSION['edit-employee-success'])){
        echo "
        <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <i class='fa fa-check fa-lg'></i>".$_SESSION['edit-employee-success']."
        </div>
    ";
    unset($_SESSION['edit-employee-success']);
    }

    if(isset($_SESSION['edit-employee-error'])){
        echo "
        <div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['edit-employee-error']."
        </div>
    ";
    unset($_SESSION['edit-employee-error']);
    }

?>