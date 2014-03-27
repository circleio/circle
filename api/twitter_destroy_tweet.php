<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library
    $consumerkey = "UBHtHJkGEGwnbKPvjrsLA";
    $consumersecret = "apP8rNPgf6D86iRlRQ6HWXdSWiRldlFUnJikm9MIM8";
    $accesstoken = "586928338-G4In5JYGKvQf0LT5B1bPUbd0fBlyUGLSljOZp9mM";
    $accesstokensecret = "tJ00KhibrLCQoTyTldjlJgklwS7VliMrmS7w6GEu1K5RZ";
 
    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
        $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
        return $connection;
    }
 
    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json?include_rts=true";
    $tweets = $connection->get($url);
    for($i=0;$i<count($tweets);$i++) {
        if(isset($tweets[$i]->retweeted_status)) {
            if($tweets[$i]->retweeted_status->id==$_GET['id'])
		    $id = $tweets[$i]->id;
	}
    }
    $destroy = $connection->post('https://api.twitter.com/1.1/statuses/destroy/' . $id . '.json');
?>
