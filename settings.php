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

	<div class="row">
		<div class="col-lg-1"> </div>
		<div class="col-lg-10" id="facebook_account">
			<div class="row">
				<div class="col-lg-12">
					<h3> Facebook Account </h3>
					<hr>
				</div>
			</div>
			<div class="row">
			    <div class="col-lg-12">
			        <div id="loginbuttonfb" style="display:block;"><img src='./static/images/loading.gif' width='40px'> </img> <br>Fetching facebook info</div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-lg-12">
	                        <div id="removeButtonFB"><button id="removeFacebook" class="btn btn-primary" onclick="removeFacebook();" style="display:none;">Remove Facebook</button></div> 
		            </div>
			</div>
		</div>
		<div class="col-lg-1"> </div>
	</div>
	<br><br><br>
        <div class="row">
            <div class="col-lg-1"></div>
	    <div class="col-lg-10" id="twitter_account">
	        <div class="row">
                    <div class="col-lg-12">
                        <h3>Twitter Account</h3>
			<hr>
		    </div>
		</div>
	    </div>
	    <div class="col-lg-1"></div>
	</div>
	<br><br><br>
	<div class="row">
             <div class="col-lg-1"></div>
         <div class="col-lg-10" id="askfm_account">
             <div class="row">
                 <div class="col-lg-12">
                     <h3>Ask.fm Account(s)</h3>
                     <hr>
                     <div class="form-group">
                         <input type="text" id="ask-username" class="form-control col-lg-8" placeholder="Enter Username here..." style="width: 50%">
                         <button type="button" class="btn btn-primary" style="margin-left: 10px" onclick="addToUsers()" >ADD</button>
                     </div>
                     <div id="my-accounts">
                     </div>
                 </div>
             </div>
         <div class="col-lg-10"></div>
         </div>
    </div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/settings.js"></script>
<script>
function addToUsers(){
    var username = document.getElementById("ask-username");
    console.log(username.value);
    $("#my-accounts").append("<div><div>"+username.value+"</div><div>"+"</div>"); 
    username.value = "";
}
</script>
<?php
include 'footer.php';
?>
</body>
