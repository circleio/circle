<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
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
if($result==null) {
    $response = array('status' => 0);
    echo json_encode($response);
    return;
}
$data = file_get_contents("https://graph.facebook.com/me/home?access_token=".$result."&limit=".$count);
$response = array('status' => 1, 'data' => $data);
//echo json_encode($response, JSON_PRETTY_PRINT);
$array = json_decode(file_get_contents("https://graph.facebook.com/me/home?access_token=".$result."&limit=".($count+50)));
//echo json_encode($array, JSON_PRETTY_PRINT);
//echo json_encode($array->data, JSON_PRETTY_PRINT);
$array = $array->data;
$newarray = array();
foreach($array as $item) {
	if(!isset($item->story)) {
		if(count($newarray) < $count) 	array_push($newarray, $item);
	}
}

$newarray = array('data' => $newarray);
echo json_encode($newarray, JSON_PRETTY_PRINT);

?>
