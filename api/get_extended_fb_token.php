<?php
	$access_token = trim($_REQUEST[access_token]);
	$appId = '420288881450005';
	$appSecret = '39dd9707bb75b8bb0f8b54ed689eaea3';

	$url = "https://graph.facebook.com/oauth/access_token?client_id=$appId&client_secret=$appSecret&grant_type=fb_exchange_token&fb_exchange_token=$access_token";

	$result = file_get_contents($url);
	$a = $result;
	$a = explode('=',$a,2)[1];
	$a = explode('&',$a,2)[0];
	echo $a;

?>
