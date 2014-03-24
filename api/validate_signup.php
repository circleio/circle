<?php
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$username = $_GET['username'];
$password = $_GET['password'];
include '../dbconnect.php';
mysqli_select_db($connect, $dbname) or die("cannot connect to database");
$query_username = "SELECT * FROM users WHERE username='" . $username . "'";
$query_email = "SELECT * FROM users WHERE email='" . $email . "'";
$result_username = mysqli_query($connect, $query_username);
$result_email = mysqli_query($connect, $query_email);
if(mysqli_num_rows($result_username)==0 && mysqli_num_rows($result_email)==0) {
}
?>
