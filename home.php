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
<?php
include 'footer.php';
?>
