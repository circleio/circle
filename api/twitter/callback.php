<?php
session_start();
require_once('twitteroauth.php');
define("CONSUMER_KEY", "UBHtHJkGEGwnbKPvjrsLA");
define("CONSUMER_SECRET", "apP8rNPgf6D86iRlRQ6HWXdSWiRldlFUnJikm9MIM8");
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
$oauth_token = $access_token['oauth_token'];
$oauth_token_secret = $access_token['oauth_token_secret'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);
$message = 'CircleIO is awesome';
$tweet = $connection->post('https://api.twitter.com/1.1/statuses/update.json?status=' . $message);
?>
