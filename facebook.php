<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include 'includes.php';
include 'header.php';
?>
<title>Circle</title>
<div id="wrap">
    <div id="main" class="container clear-top">
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/facebook_feed.js"></script>
<?php
include 'footer.php';
?>
