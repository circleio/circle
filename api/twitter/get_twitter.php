<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library

if(!$_GET['username']) {
    $response = array('status' => 0);
    echo json_encode($response);
}
else {
    $twitteruser = $_GET['username'];
    if($_GET['count'])
        $notweets = $_GET['count'];
    else
        $notweets = 25;
    $consumerkey = "UBHtHJkGEGwnbKPvjrsLA";
    $consumersecret = "apP8rNPgf6D86iRlRQ6HWXdSWiRldlFUnJikm9MIM8";
    $accesstoken = "586928338-G4In5JYGKvQf0LT5B1bPUbd0fBlyUGLSljOZp9mM";
    $accesstokensecret = "tJ00KhibrLCQoTyTldjlJgklwS7VliMrmS7w6GEu1K5RZ";
 
    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
        $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
        return $connection;
    }
 
    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

    $data = array();
    for($x=0; $x<$notweets; $x++) {
        $each_data = array('name' => $tweets[$x]->user->name, 'screen_name' => $tweets[$x]->user->screen_name, 'text' => $tweets[$x]->text);
        array_push($data, $each_data);
    }

    $response = array('status' => 1, 'data' => $data);
    echo json_encode($response);
}
?>
