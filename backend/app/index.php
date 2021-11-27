<?php
include "function.php";
include "logger.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 

$jsonArray = array(); 
$jsonArray["error"] = FALSE;
setLog($_SERVER['REQUEST_METHOD'],$_GET["datetime"]);
$_code = 200;
echo json_encode($_SERVER['REQUEST_METHOD']);
if($_SERVER['REQUEST_METHOD'] == "GET") {
	
    if(isset($_GET["datetime"]) && !empty(trim($_GET["datetime"]))) {
			$jsonArray["result"] = ['OK+++'];
			$_code = 200;
		
	}else {
		$_code = 400;
		$jsonArray["error"] = TRUE; 
    	$jsonArray["errorMessage"] = "Please send DateTime value";
	}
}else {
	$_code = 406;
	$jsonArray["error"] = TRUE;
 	$jsonArray["errorMessage"] = "invalid Function";
}

SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);
?>
