<?php

	$request =""; //initialise the request variable
	$param['method']= "sendMessage";
	$param['send_to'] = "917204910178";//.$_POST['mc-email'];
	$param['msg'] = "Kindly download the Edu-network link - https://edunetwork.iugale.tech/app";
	$param['userid'] = "2000186787";
	$param['password'] = "subten";
	$param['v'] = "1.1";
	$param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
	$param['auth_scheme'] = "PLAIN";
	
	//Have to URL encode the values
	foreach($param as $key=>$val) {
		$request.= $key."=".urlencode($val);//we have to urlencode the values
		$request.= "&";//append the ampersand (&) sign after each parameter/value pair
	
	}
	$request = substr($request, 0, strlen($request)-1);//remove final (&) sign from the request
	
	$url =
	"http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	$err = curl_error($ch);
	curl_close($ch);
	
	if ($err) {
		echo "Oops! We encountered an error.";//cURL Error #:" . $err;
	}
	else {
		$manage = json_decode($response, true);

		if (strpos($response, 'success') !== false) {
			header('Location: http://edunetwork.iugale.tech/');
		}
	}

?>