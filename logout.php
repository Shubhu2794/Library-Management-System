<?php
    session_start();
    unset($_SESSION['Login_user']);

    if (session_destroy()) {
        header("Loaction: student-login.php");
    }
?>