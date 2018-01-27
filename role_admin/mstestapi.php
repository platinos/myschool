<?php session_start();

include 'config.php';

header("Access-Control-Allow-Origin: *");


$inputJSON = file_get_contents('php://input');
$obj= json_decode( $inputJSON, TRUE ); //convert JSON into array

//print_r(json_encode($obj));



// $json = file_get_contents('php://input');
// $obj = json_decode($json);
// var_dump($obj);
$func = $obj['func'];
//$func = $obj
//echo $func;
$params = getparams($obj);
$feed = apicall($func,$params);
//var_dump($params);
//var_dump($feed);
echo json_encode($feed);

function getparams($obj)
{
	$params = array();

	foreach ($obj as $key => $value) { 

		if($key != 'func')	$params[$key] = $value;
		

	}
	return $params;
}
?>