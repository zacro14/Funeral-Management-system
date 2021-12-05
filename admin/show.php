<?php
session_start();
    if(isset($_SESSION['show']))
    {
        echo $_SESSION['show'];
    }
?>