<?php
session_start();
require_once("twitter_twitteroauth.php"); //Path to twitteroauth library

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
    include '../dbconnect.php';
    mysqli_select_db($connect, $dbname);
    $query = "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "' AND username='" . $_SESSION['username'] . "'";
    $response = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($response);
    $accesstoken = $row['twitter_token'];
    $accesstokensecret = $row['twitter_token_secret'];
 
    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
        $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
        return $connection;
    }
 
    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

    $data = array();
    for($x=0; $x<$notweets; $x++) {
        $each_data = array('id' => (string)$tweets[$x]->id, 'name' => $tweets[$x]->user->name, 'screen_name' => $tweets[$x]->user->screen_name, 'text' => $tweets[$x]->text, 'retweeted' => $tweets[$x]->retweeted);
        array_push($data, $each_data);
    }

    $response = array('status' => 1, 'data' => $data);
    echo json_encode($response);
}
?>
