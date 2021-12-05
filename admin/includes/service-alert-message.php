<?php
    if(isset($_SESSION['service-edit-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['service-edit-error']."
            </div>
        ";
        unset($_SESSION['service-edit-error']);
    }
    if(isset($_SESSION['service-edit-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['service-edit-success']."
            </div>
        ";
        unset($_SESSION['service-edit-success']);
    }

    if(isset($_SESSION['service-delete-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['service-delete-error']."
            </div>
        ";
        unset($_SESSION['service-delete-error']);
    }
    if(isset($_SESSION['service-delete-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['service-delete-success']."
            </div>
        ";
        unset($_SESSION['service-delete-success']);
    }

    if(isset($_SESSION['add-service-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-service-error']."
            </div>
        ";
        unset($_SESSION['add-service-error']);
    }
    if(isset($_SESSION['add-service-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-service-success']."
            </div>
        ";
        unset($_SESSION['add-service-success']);
    }
?>