<?php
    if(isset($_SESSION['add-casket-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-casket-error']."
            </div>
        ";
        unset($_SESSION['add-casket-error']);
    }
    
    if(isset($_SESSION['add-casket-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-casket-success']."
            </div>
        ";
        unset($_SESSION['add-casket-success']);
    }

    if(isset($_SESSION['edit-casket-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['edit-casket-success']."
            </div>
        ";
        unset($_SESSION['edit-casket-success']);
    }

    if(isset($_SESSION['edit-casket-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['edit-casket-error']."
            </div>
        ";
        unset($_SESSION['edit-casket-error']);
    }

    if(isset($_SESSION['delete-casket-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['delete-casket-error']."
            </div>
        ";
        unset($_SESSION['delete-casket-error']);
    }
    if(isset($_SESSION['delete-casket-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['delete-casket-success']."
            </div>
        ";
        unset($_SESSION['delete-casket-success']);
    }

    if(isset($_SESSION['add-quantity-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-quantity-error']."
            </div>
        ";
        unset($_SESSION['add-quantity-error']);
    }
    if(isset($_SESSION['add-quantity-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-quantity-success']."
            </div>
        ";
        unset($_SESSION['add-quantity-success']);
    }

   
?>