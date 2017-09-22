<?php
header("Content-Type: application/json");
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
/*

public function viewques(){

	$sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);
    $rows = array();
   while($r = mysql_fetch_assoc($result)) {
     $rows['object_name'][] = $r;
   }
   echo json_encode($rows);

}	
*/
