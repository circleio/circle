<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include 'includes.php';
include 'header.php';
include 'dbconnect.php';

mysqli_select_db($connect, $dbname);

$result = mysqli_query($connect, "SELECT fb_account from users where username = '$_SESSION[username]';");
$access_token = mysqli_fetch_assoc($result);
$access_token = $access_token[fb_account];
$fbConnected = false;
$user_info = array();
if(!$access_token) {
	$fbConnected = false;
	echo "<script> fbConnected = false; </script>";
} else {
	echo "We have access token";
	$result = file_get_contents("./api/validate_access_token.php?access_tokien=".$access_token);
	$result = json_decode($result);
	print_r($result);
}

?>
<title>Circle - Home</title>
<body>
    <?php include 'fbjssdk.php'; ?>
    <div id="wrap">
        <div id="main" class="container clear-top">
		<?php
			if($fbConnected == false) {
		?>
				<div class="fb-login-button" scope="read_stream" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
		<?php
			} else {

			}
		?>
        </div>
    </div>
<?php
include 'footer.php';
?>
</body>
