<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include '../dbconnect.php';

mysqli_select_db($connect, $dbname);

$query = "SELECT fb_account FROM users WHERE username = \"$_SESSION[username]\";";
$result = mysqli_query($connect, $query);

$result = mysqli_fetch_assoc($result);
$result = $result[fb_account];
echo "Hrl";
echo $result;

?>
