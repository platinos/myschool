<?php
header("Content-Type: application/json");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'dbconnect.php';

if(isset($_POST["func"]) && !empty($_POST["func"])){
	switch ($_POST["func"]) {
		case 'viewques':

			viewques();
			break;
		
		default:
		$response = array("error" => TRUE);
	$response["error_msg"] = "Function name not defined.";
    echo json_encode($response);
			break;
	}

}
else{
	$response = array("error" => TRUE);
	$response["error_msg"] = "Function name missing.";
    echo json_encode($response);
}

/***********************************************************/
/********************* Functions Start *********************/
/***********************************************************/


public function viewques(){

	$sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);
    $rows = array("error" => FALSE);
   while($r = mysql_fetch_assoc($result)) {
     $rows['object_name'][] = $r;
   }
   echo json_encode($rows);

}	
?>
