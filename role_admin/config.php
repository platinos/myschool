<?php
$api_url = "http://35.194.226.60/msapi/api.php";
$access_token= "nothing";
$secret_key= "nothing";



function apicall($func_name, $params){
	//$feed = null;

if(isset($func_name) && !empty($func_name)){
	echo "i m here";

	if(isset($params) && !empty($params)){
		echo "i got in deep";
		$func_array = ['func_name' => '$func_name'];
		$values = array_merge($func_name, $params);
		$parameters = http_build_query($values);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$GLOBALS['api_url']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec ($ch);
		$feed = json_decode($output, true);
	}
	else{
		echo "i am on surface";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$GLOBALS['api_url']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"func=".$func_name);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec ($ch);
		$feed = json_decode($output, true);
	}


}
else{
	echo "i was out";
	$output = [ 'error' => 'Function name not set.'];
	$feed = json_decode($output, true);

}
return $feed;



}

?>