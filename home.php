<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include 'includes.php';
include 'header.php';
?>
<title>Circle - Home</title>
<div id="wrap">
    <div id="main" class="container clear-top">
    </div>
</div>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="static/js/circle.js"></script>
<?php
include 'footer.php';
?>
