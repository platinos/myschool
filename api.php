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


public function viewques(){

include 'dbconnect.php';


$response = array("error" => FALSE);
$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
$i=0;

while($data = mysqli_fetch_assoc($result)){
	$response["error"] = FALSE;
	$response["data"][$i]["id"] = $data["id"];
	$response["data"][$i]["class"] = $data["class"];
	$response["data"][$i]["type"] = $data["type"];
	$response["data"][$i]["subject"] = $data["subject"];
	$response["data"][$i]["chapter"] = $data["chapter"];
	$response["data"][$i]["level"] = $data["level"];
	$response["data"][$i]["topic"] = $data["topic"];
	$response["data"][$i]["marks"] = $data["marks"];
	$response["data"][$i]["ques_txt"] = $data["ques_txt"];
	$response["data"][$i]["ques_img"] = $data["ques_img"];
	//Options Remaining
	$response["data"][$i]["answer"] = $data["answer"];
	$response["data"][$i]["youtube"] = $data["youtube"];
	$i++;

}
$response["data"]["size"] = $i;

echo json_encode($response);

}	
?>
