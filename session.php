<?php
    session_start();
    $user=$_SESSION['login-user'];
    if (!isset($_SESSION['login-user'])) {
        header("location:student-login.php");
        exit();
    }
    $admin=$_SESSION['admin'];
    if (!isset($_SESSION['admin'])) {
        header("location:admin-login.php");
        exit();
    }
?>