<?php
session_start();
require_once('twitter_twitteroauth.php');
define("CONSUMER_KEY", "UBHtHJkGEGwnbKPvjrsLA");
define("CONSUMER_SECRET", "apP8rNPgf6D86iRlRQ6HWXdSWiRldlFUnJikm9MIM8");
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
if(isset($access_token['oauth_token'])) {
    $oauth_username = $access_token['screen_name'];
    $oauth_token = $access_token['oauth_token'];
    $oauth_token_secret = $access_token['oauth_token_secret'];
    include '../dbconnect.php';
    mysqli_select_db($connect, $dbname) or die("cannot connect to database");
    $query = "UPDATE users SET twitter_username='" . $oauth_username . "', twitter_token='" . $oauth_token . "', twitter_token_secret='" . $oauth_token_secret . "' WHERE id='" . $_SESSION['id'] . "'";
    mysqli_query($connect, $query);
}
include '../includes.php';
// Header location needs to be dynamic.
header('Location: http://54.203.112.16/circle/settings.php');
?>
