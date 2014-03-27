<?php
//debugging!
ini_set('display_errors',1);
error_reporting(E_ALL);
    $dbname = "circle";
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $connect = -1;
    $connect = @mysqli_connect($dbserver, $dbuser, $dbpassword) or die("cannot connect to sql server");
?>
