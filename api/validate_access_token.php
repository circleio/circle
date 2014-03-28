<?php
	header('Content-type: text/json');
	include './fbsdk/facebook.php';
	$facebook = new Facebook(array(
		'appId' => '420288881450005',
		'secret' => '39dd9707bb75b8bb0f8b54ed689eaea3',

	));

	if(!isset($_REQUEST['access_token'])) {
		echo json_encode(array(
			'error' => 'No access token given',
		));

		die();
	}

	$access_token = trim($_REQUEST['access_token']);
	$facebook->setAccessToken($access_token);
	$user = $facebook->getUser();

	if(!$user) {
		echo json_encode(array(
			'valid' => 'false',
			'error' => 'Invalid access token',
		));

		die();
	}

	$permissions = $facebook->api("/me/permissions");
	if(!isset($permissions['data'][0]['read_stream'])) {
		echo json_encode(array(
			'valid' => 'false',
			'error' => 'Dont have all required permissions',
		));
		die();
	}

	$result = $facebook->api("/me");
	$result = array(
		'valid' => 'true',
		'info' => $result,
	);
	echo json_encode($result, JSON_PRETTY_PRINT);

	include 'upload_new_token.php';	
?>

