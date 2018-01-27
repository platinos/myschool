<?php session_start();

include 'config.php';

header("Access-Control-Allow-Origin: *");

$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$func = $obj['func'];
echo $func;
$params = getparams();
$feed = apicall($func,$params);
var_dump($params);
var_dump($feed);
echo json_encode($feed);

function getparams()
{
	$params = array();

	foreach ($obj as $key => $value) { 

		if($obj != 'func')	$params[$key] = $value;
		

	}
	return $params;
}
?>