<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include '../dbconnect.php';

mysqli_select_db($connect, $dbname);

$query = "SELECT fb_account FROM users WHERE username = \"$_SESSION[username]\";";
$result = mysqli_query($connect, $query);
$count = 25;
if(isset($_REQUEST['count'])) {
	$count = $_REQUEST['count'];
}

$result = mysqli_fetch_assoc($result);
$result = $result[fb_account];
echo json_encode(json_decode(file_get_contents("https://graph.facebook.com/me/home?access_token=".$result."&limit=".$count)),JSON_PRETTY_PRINT);
?>
