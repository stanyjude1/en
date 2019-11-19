<?php
	$curl = curl_init();
	$post_fields = array();
	$post_fields["method"] = "sendMessage";
	$post_fields["send_to"] = "91".$_POST['mc-email'];
	$post_fields["msg"] = "Kindly download the Edu-network link - GoogleLink";
	$post_fields["msg_type"] = "TEXT";
	$post_fields["userid"] = "2000186787";
	$post_fields["password"] = "subten";
	$post_fields["auth_scheme"] = "PLAIN";
	$post_fields["format"] = "JSON";
	curl_setopt_array($curl, array(
	CURLOPT_URL => "http://enterprise.smsgupshup.com/GatewayAPI/rest",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $post_fields
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	}
	else {
		$manage = json_decode($response, true);
		//echo $response;
		if($manage['response']['status'] == 'success'){
			header('Location: http://edunetwork.iugale.tech/');
		}
	}
?>