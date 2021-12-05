<?php
    if(isset($_SESSION['add-work-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-work-error']."
            </div>
        ";
        unset($_SESSION['add-work-error']);
    }
    if(isset($_SESSION['add-work-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-work-success']."
            </div>
        ";
        unset($_SESSION['add-work-success']);
    }


    if(isset($_SESSION['add-sched-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['add-sched-error']."
            </div>
        ";
        unset($_SESSION['add-sched-error']);
    }
    if(isset($_SESSION['add-sched-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['add-sched-success']."
            </div>
        ";
        unset($_SESSION['add-sched-success']);
    }

    

    if(isset($_SESSION['delete-work-error'])){
        echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-exclamation fa-lg'></i>".$_SESSION['delete-work-error']."
            </div>
        ";
        unset($_SESSION['delete-work-error']);
    }
    if(isset($_SESSION['delete-work-success'])){
        echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-check fa-lg'></i>".$_SESSION['delete-work-success']."
            </div>
        ";
        unset($_SESSION['delete-work-success']);
    }

 
?>