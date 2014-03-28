<?php
	session_start();

	if(!isset($_SESSION['username'])) {

		 header('Location: ../index.php');

	}

	include '../dbconnect.php';
	mysqli_select_db($connect, $dbname);
	$query = "SELECT fb_account from users WHERE username = \"$_SESSION[username]\";";
	$query = mysqli_query($connect, $query);
	$query = mysqli_fetch_assoc($query);
	$query = $query[fb_account];
	echo $query;
?>
