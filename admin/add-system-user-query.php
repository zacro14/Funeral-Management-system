<?php
    include 'includes/db-connection.php';
    session_start();
    if(isset($_POST['btn-add']))
    {
        $admin_firstname = $_POST['admin_firstname'];
        $admin_middlename = $_POST['admin_middlename'];
        $admin_lastname = $_POST['admin_lastname'];
        $admin_email = $_POST['admin_email'];
        $admin_contact = $_POST['admin_contact'];
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        $admin_branch = $_POST['branch'];

        $insert_admin = "INSERT INTO admin (admin_firstname, admin_middlename, admin_lastname, admin_email, admin_contact, admin_username, admin_password, branch_id) VALUES ('$admin_firstname', '$admin_middlename', '$admin_lastname', '$admin_email', '$admin_contact', '$admin_username', '$admin_password', '$admin_branch')";
        $query = $conn->query($insert_admin);
        if($query === true)
        {
            $_SESSION['add-success'] = "User successfully added";
        }
        else
        {
            $_SESSION['add-error'] = $conn->error;
        }
    }

    header("location: add-system-user.php");
?>