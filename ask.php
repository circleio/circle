<title>Circle</title>
<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location: index.php');
}
include 'includes.php';
include 'header.php';
?>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/getAskFeed.js"></script>
<script>
var obj = new Object();
window.onload = getAllUrlParameters(obj);
window.onload = initializeFeed(obj);
window.onload = fillMain(obj);
</script>
<div id="wrap">
    <div id="main" class="container clear-top">
    </div>
</div>
<head>
</head>
<div id="results"></div>
<?php
include 'footer.php';
?>
