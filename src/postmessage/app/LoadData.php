<?php
namespace postmessage\app;
require_once '../../../vendor/autoload.php';
if (isset($_POST['message'])) {	
	$userMessage = new UserMessage();		
	$insertMessage = $userMessage->upsertMessage($_POST['message']);
	
	return $insertMessage;	
}
return false;