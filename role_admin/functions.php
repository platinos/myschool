<?php

include 'config.php';

/***********************************************************/
/******************* Functions Switching *******************/
/***********************************************************/

if(isset($_GET["func"]) && !empty($_GET["func"])){

$func = $_GET["func"];
$params = getparams();

$feed = apicall($func,$params);
var_dump($feed);

	}


function getparams()
{
		$params = array();

		foreach ($_GET as $key => $value) { 

			if($key != 'func')	$params[$key] = $value;
			

		}
		return $params;
}



?>