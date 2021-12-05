<?php
    if(isset($_SESSION['add-deceased-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-deceased-error']."
            </div>
        ";
        unset($_SESSION['add-deceased-error']);
    }
    if(isset($_SESSION['add-deceased-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-deceased-success']."
            </div>
        ";
        unset($_SESSION['add-deceased-success']);
    }


    if(isset($_SESSION['edit-deceased-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['edit-deceased-error']."
            </div>
        ";
        unset($_SESSION['edit-deceased-error']);
    }
    if(isset($_SESSION['edit-deceased-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['edit-deceased-success']."
            </div>
        ";
        unset($_SESSION['edit-deceased-success']);
    }

    if(isset($_SESSION['delete-deceased-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['delete-deceased-error']."
            </div>
        ";
        unset($_SESSION['delete-deceased-error']);
    }
    if(isset($_SESSION['delete-deceased-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['delete-deceased-success']."
            </div>
        ";
        unset($_SESSION['delete-deceased-success']);
    }

    
?>