<?php
$api_url = "http://35.194.226.60/msapi/api.php";
$access_token= "nothing";
$secret_key= "nothing";



function apicall($func_name, $params){
	//$feed = null;

if(isset($func_name) && !empty($func_name)){
	

	if(isset($params) && !empty($params)){
		
		$func_array = ['func' => $func_name];
		$values = array_merge($func_array, $params);
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
	
	$output = [ 'error' => 'Function name not set.'];
	$feed = json_decode($output, true);

}
return $feed;



}

?>