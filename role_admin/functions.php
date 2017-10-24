<?php

include 'config.php';

/***********************************************************/
/******************* Functions Switching *******************/
/***********************************************************/

if(isset($_GET["func"]) && !empty($_GET["func"])){
	$params = array();

foreach ($_GET as $key => $value) { 

if($key != 'func'){
$params[$key] = $value;
}

}

var_dump($params);

	}


?>