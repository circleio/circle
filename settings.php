<?php
session_start();
if(!isset($_SESSION['username'])) {
//    header('Location: index.php');
}
include 'includes.php';
include 'header.php';
//include 'dbconnect.php';

//mysqli_select_db($connect, $dbname);


//$result = mysqli_query($connect, "SELECT fb_account from users where username = '$_SESSION[username]';");
//$access_token = mysqli_fetch_assoc($result);
//$access_token = $access_token[fb_account];
//$user_info = array();
//if(!$access_token) {
//	echo "<script> fbConnected = false; access_token = undefined; </script>";
//} else {
//	echo "<script> access_token = \"$access_token\";  </script>";
//}

?>

<title>Circle - Home</title>
<body>
    <?php include 'fbjssdk.php'; ?>
    <div id="wrap">
        <div id="main" class="container clear-top">
				<div id="loginbuttonfb" style="display:block;" class="fb-login-button" scope="read_stream" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
        </div>

	<div > <button id="removeFacebook" onclick="removeFacebook();" style="display:none;"> Remove Facebook </button>  </div>
        <div class="row">
            <div class="col-lg-1"></div>
	    <div class="col-lg-10">
	    <legend>Twitter</legend>
	    <div class="row">
	    <div class="form-group">
	    <label for="inputTwitterToken" class="col-lg-2 control-label">Access Token</label>
	    <div class="col-lg-6">
	    <input type="text" class="form-control" id="twitter_token" placeholder="Access Token">
	    </div>
	    </div>
	    </div>
	    <div class="row">
	    <div class="form-group">
	    <label for="inputTwitterTokenSecret" class="col-lg-2 control-label">Access Token Secret</label>
	    <div class="col-lg-6">
	    <input type="text" class="form-control" id="twitter_token_secret" placeholder="Access Token Secret">
	    </div>
	    </div>
	    </div>
	    <div class="row">
	    <div class="form-group">
	    <div class="col-lg-6 col-lg-offset-2">
	    <button class="btn btn-primary" onClick="twitter_details();">Submit</button>
	    </div>
	    </div>
	    </div>
	    </div>
	    <div class="col-lg-1"></div>
	</div>
    </div>
    <script>
        function twitter_details() {
            var token = document.getElementById('twitter_token');
	    var token_secret = document.getElementById('twitter_token_secret');
	    var xmlhttp=new XMLHttpRequest();
	    xmlhttp.onreadystatechange=function() {
                if(xmlhttp.readyState==4 && xmlhttp.status==200) {
		}
	    }
	    xmlhttp.open("GET", "api/update_twitter_token.php?twitter_token=" + token.value + "&twitter_token_secret=" + token_secret.value, true);
	    xmlhttp.send();
	}
    </script>
<?php
include 'footer.php';
?>
</body>
