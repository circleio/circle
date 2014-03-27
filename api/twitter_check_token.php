<?php
session_start();
include '../dbconnect.php';
mysqli_select_db($connect, $dbname);
$query = "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "' AND username='" . $_SESSION['username'] . "'";
$response = mysqli_query($connect, $query);
$row = mysqli_fetch_array($response);
if($row['twitter_token']==null && $row['twitter_token_secret']==null) {
    $return_value = array('status' => 0);
    echo json_encode($return_value);
    return;
}
else {
    $return_value = array('status' => 1);
    echo json_encode($return_value);
    return;
}
?>
