<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method = "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->paramters->text;

	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);

	switch ($text){
		case 'hi':
			$speech = "Hi, nice to meet you";
			break;
		case 'bye':
			$speech = "Bye, goodnight";
			break;
		case 'anything':
			$speech = "yes, you can type anything here";
			break;
		default:
			$speech = "sorry, I didnt get that. Please ask me something else.";
			break;
	}

}else{
	echo "Method not allowed";
}

?>