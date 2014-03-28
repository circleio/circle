<?php
    //debugging
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    include 'dbconnect.php';
    $create_database = mysqli_select_db($connect, $dbname);
    if(!$create_database) {
        $create_db_query = "CREATE DATABASE " . $dbname;
        mysqli_query($connect, $create_db_query) or die(mysqli_error());
    }
    mysqli_select_db($connect, $dbname);
    $users_table = "CREATE TABLE IF NOT EXISTS users(
                       id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                       first_name VARCHAR(30) NOT NULL,
                       last_name VARCHAR(30) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       username VARCHAR(30) NOT NULL,
                       password VARCHAR(35) NOT NULL,
                       activate INT NOT NULL DEFAULT 0,
                       deactivate INT NOT NULL DEFAULT 0,
                       askfm_account VARCHAR(1000) DEFAULT null,
                       fb_account VARCHAR(30) DEFAULT null,
                       twitter_username VARCHAR(50) DEFAULT null,
                       twitter_token VARCHAR(55) DEFAULT null,
                       twitter_token_secret VARCHAR(55) DEFAULT null);";
    mysqli_query($connect, $users_table) or die("cannot create table");
    $add_admin = "INSERT INTO users VALUES(1, 'admin', 'admin', 'admin@example.com', 'admin', md5('admin'), 1, 0, null, null, null, null, null);";
    mysqli_query($connect, $add_admin) or die("cannot add admin");
?>
