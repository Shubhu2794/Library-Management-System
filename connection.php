<?php

    $dbhost="localhost"; //this runs locally on your computer
    $dbuser="root";  //username database
    $dbpass=""; // password to mysql.. no password
    $dbname="library"; // Name of the database
    $dbport=3306; // Port number to which mysql is connected

    global $con; // global variable for connection

    if (!$con= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport)) {
        die("Connection to Database failed!!"); // In case the database can not be connected
    }
?>