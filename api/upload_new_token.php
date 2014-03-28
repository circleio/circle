<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
}
include '../dbconnect.php';
mysqli_select_db($connect, $dbname);
echo mysqli_query($connect, "UPDATE users SET fb_account=\"" . trim($_REQUEST[access_token]) . "\" WHERE username=\"$_SESSION[username]\"");
	

?>
