<?php
session_start();
include '../dbconnect.php';
mysqli_select_db($connect, $dbname);
$query = "UPDATE users SET twitter_username=null, twitter_token=null, twitter_token_secret=null WHERE id='" . $_SESSION['id'] . "';";
mysqli_query($connect, $query);
?>
