<?php
    if(isset($_SESSION['add-client-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-client-error']."
            </div>
        ";
        unset($_SESSION['add-client-error']);
    }
    if(isset($_SESSION['add-client-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-client-success']."
            </div>
        ";
        unset($_SESSION['add-client-success']);
    }

    if(isset($_SESSION['client-edit-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['client-edit-error']."
            </div>
        ";
        unset($_SESSION['client-edit-error']);
    }
    if(isset($_SESSION['client-edit-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['client-edit-success']."
            </div>
        ";
        unset($_SESSION['client-edit-success']);
    }

    if(isset($_SESSION['client-delete-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['client-delete-error']."
            </div>
        ";
        unset($_SESSION['client-delete-error']);
    }
    if(isset($_SESSION['client-delete-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['client-delete-success']."
            </div>
        ";
        unset($_SESSION['client-delete-success']);
    }
?>