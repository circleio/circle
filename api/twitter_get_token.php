<?php
session_start();
require_once('twitter_twitteroauth.php');
define("CONSUMER_KEY", "UBHtHJkGEGwnbKPvjrsLA");
define("CONSUMER_SECRET", "apP8rNPgf6D86iRlRQ6HWXdSWiRldlFUnJikm9MIM8");
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
$request_token = $connection->getRequestToken();
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
$url = $connection->getAuthorizeURL($request_token);
header('Location: ' . $url);
?>
