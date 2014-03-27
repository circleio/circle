<?php
include '../dbconnect.php';
mysqli_select_db($connect, $dbname);
$query = "UPDATE users SET twitter_token='" . $_GET['twitter_token'] . "', twitter_token_secret='" . $_GET['twitter_token_secret'] . "' WHERE id=1";
mysqli_query($connect, $query);
?>
