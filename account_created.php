<?php
session_start();
if(isset($_SESSION['username'])) {
    header('Location: home.php');
}
include 'includes.php';
include 'header.php';
?>
<title>Circle</title>
<div id="wrap">
    <div id="main" class="container clear-top">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <img src="static/images/account_created.png" width="512px"/>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Your account has been created. To start using your account, verify your account from your email.</h3>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
