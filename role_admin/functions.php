<?php

include 'config.php';

/***********************************************************/
/******************* Functions Switching *******************/
/***********************************************************/

if(isset($_GET["func"]) && !empty($_GET["func"])){

$func = $_GET["func"];
$params = getparams();

$feed = apicall($func,$params);

if($feed['error']==true)
{
	echo "an error occured.";
}
else{
echo "Executed Successfully.";
echo "<script>window.close();</script>";
}

}
	else if (isset($_POST['func']) && !empty($_POST['func'])) {
	

$func = $_POST["func"];
$params = getparams2();

$feed = apicall($func,$params);

echo $feed;


}


function getparams()
{
		$params = array();

		foreach ($_GET as $key => $value) { 

			if($key != 'func')	$params[$key] = $value;
			

		}
		return $params;
}
function getparams2()
{
		$params = array();

		foreach ($_POST as $key => $value) { 

			if($key != 'func')	$params[$key] = $value;
			

		}
		return $params;
}





?>