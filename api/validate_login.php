<?php

//debugging!
//ini_set('display_errors',1);
//error_reporting(E_ALL);

$username = $_POST['username'];
$password = $_POST['password'];
include '../dbconnect.php';
mysqli_select_db($connect, $dbname) or die("cannot connect to database");
$query = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . md5($password) . "'";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)==0) {
    $return_value = array('status' => 0);
}
else {
    $row = mysqli_fetch_array($result);
    $return_fields = array('first_name' => $row['first_name'], 'username' => $row['username']);
    $return_value = array('status' => 1, 'fields' => $return_fields);
    session_start();
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
}
echo json_encode($return_value);
?>
