<?php
    include 'dbconnect.php';
    $delete_db_query = "DROP DATABASE " . $dbname;
    mysqli_query($connect, $delete_db_query) or die("cannot delete database");
?>
