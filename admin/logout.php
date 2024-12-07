<?php 
    include('../constant.php');
    //Destroy the session
    //session_destroy();
    unset($_SESSION['user']);
    //rediret to login
    header("location:" . "login.php");
?>