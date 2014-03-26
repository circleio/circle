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
$user_info = array();
if(!$access_token) {
	echo "<script> fbConnected = false; access_token = undefined; </script>";
} else {
	echo "<script> access_token = \"$access_token\";  </script>";
}

?>

<title>Circle - Home</title>
<body>
    <?php include 'fbjssdk.php'; ?>
    <div id="wrap">
        <div id="main" class="container clear-top">
				<div id="loginbuttonfb" style="display:block;" class="fb-login-button" scope="read_stream" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
        </div>

	<div > <button id="removeFacebook" onclick="removeFacebook();" style="display:none;"> Remove Facebook </button>  </div>

    </div>
<?php
include 'footer.php';
?>
</body>
