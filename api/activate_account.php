<?php
$code = $_GET['code'];
include '../dbconnect.php';
mysqli_select_db($connect, $dbname);
$query = "SELECT * FROM users WHERE md5(email)='" . $code . "';";
$result = mysqli_query($connect, $query);
if($result->num_rows==0) {
	$response = array('status' => 0);
	echo json_encode($response);
	return;
}
$row = mysqli_fetch_array($result);
if($row['activated']==1) {
	$response = array('status' => 1, 'success' => 0);
}
else {
	$query = "UPDATE users SET activated=1 WHERE md5(email)='" . $code . "';";
	mysqli_query($connect, $query);
	$response = array('status' => 1, 'success' => 1);
}
echo json_encode($response);
?>
