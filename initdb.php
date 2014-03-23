<?php
    include 'dbconnect.php';
    $create_database = mysqli_select_db($connect, $dbname);
    if(!$create_database) {
        $create_db_query = "CREATE DATABASE " . $dbname;
        mysqli_query($connect, $create_db_query) or die(mysqli_error());
    }
    mysqli_select_db($connect, $dbname);
    $hello = mysqli_query($connect, 'SHOW TABLES;');
    print_r($hello);
    $users_table = "CREATE TABLE IF NOT EXISTS users(
                       id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                       first_name VARCHAR(30) NOT NULL,
                       last_name VARCHAR(30) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       username VARCHAR(30) NOT NULL,
                       password VARCHAR(35) NOT NULL,
                       activate INT NOT NULL DEFAULT 0,
                       deactivate INT NOT NULL DEFAULT 0,
                       fb_account VARCHAR(30) DEFAULT null,
                       twitter_account VARCHAR(30) DEFAULT null);";
    mysqli_query($connect, $users_table) or die("cannot create table");
    $add_admin = "INSERT INTO users VALUES(1, 'admin', 'admin', 'admin@example.com', 'admin', 'admin', 1, 0, null, null);";
    mysqli_query($connect, $add_admin) or die("cannot add admin");
?>