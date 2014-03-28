<?php

//debugging!
//ini_set('display_errors',1);
//error_reporting(E_ALL);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
include '../dbconnect.php';
mysqli_select_db($connect, $dbname) or die("cannot connect to database");
$query_username = "SELECT * FROM users WHERE username='" . $username . "'";
$query_email = "SELECT * FROM users WHERE email='" . $email . "'";
$result_username = mysqli_query($connect, $query_username);
$result_email = mysqli_query($connect, $query_email);

if(mysqli_num_rows($result_username)!=0 && mysqli_num_rows($result_email)!=0) {
    $return_value = array('status' => 0, 'username' => 0, 'email' => 0);
}
else if(mysqli_num_rows($result_username)==0 && mysqli_num_rows($result_email)!=0) {
    $return_value = array('status' => 0, 'username' => 1, 'email' => 0);
}
else if(mysqli_num_rows($result_username)!=0 && mysqli_num_rows($result_email)==0) {
    $return_value = array('status' => 0, 'username' => 0, 'email' => 1);
}
else {
    $query = "INSERT INTO users (first_name, last_name, email, username, password, activated, deactivated) VALUES('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $username . "', '" . md5($password) . "', 0, 0);";
    mysqli_query($connect, $query);
    $to = $email;
    $subject = "Activate your CircleIO account!";
    $message = "Thank you for signing up with CircleIO. To activate your account, please click the link, http://54.203.112.16/circle/activate_account.php?code=" . md5($email);
    mail($to, $subject, $message);
    $return_value = array('status' => 1, 'email' => $email);
}
echo json_encode($return_value);
?>
