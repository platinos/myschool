<?php
// If the given question id is present in the cart.
	function incart($qid){
		if(isset($_SESSION['questionCart']))
			return array_search($qid, $_SESSION['questionCart']);
		else
			return false;
	
	}
// If the cart is empty.
	function displayPaperButton()
	{
		return (isset($_SESSION['questionCart']) && !empty($_SESSION['questionCart']));
	}

// Add to edited questions list.
	function addToEditedList(){
		
	}

if(isset($_GET['addQuestionsFromCsv'])){

	include 'config.php';
	$added = 0;
	$notAdded = 0;
	$target_file = "uploads/".$_GET['addQuestionsFromCsv'];
	$file = fopen($target_file,"r");
	fgetcsv($file);
    while(! feof($file)){
    	
    	$feed = fgetcsv($file);
    	switch($feed[2]){
    		case 'MCQ' : $type = 1; break;
    		case 'True / False' : $type = 2; break;
    		case 'Short Answer' : $type = 3; break;
    		case 'Long Answer' : $type = 4; break;
    		case 'Comprehension' : $type = 5; break;
    	}

    	$values = array(
		'question' => $feed[8],    
		'answer' => $feed[14],   
		'truefalse' => $feed[14],  
		'mcq1' => $feed[10],  
		'mcq2' => $feed[11], 
		'mcq3' => $feed[12],
		'mcq4' => $feed[13], 
		'class' => $feed[1], 
		'subject' => $feed[3], 
		'type' => $type, 
		'tag' => $feed[15],
		'chapter' => $feed[4], 
		'topic' => $feed[6], 
		'level' => $feed[5], 
		'marks' => $feed[7], 
		'link' => $feed[16], 
		'file' => $feed[9]
		);
		$questionAddResponse = apicall("addquestions", $values);
		if($questionAddResponse['error']==true){
			$notAdded ++;

		}
		else{
			$added++;
		}



    }
    echo '{
    	"added" : '.$added.',
    	"notAdded" : '.$notAdded.'
    }';
                            

}

//local api to view users
function localapicall($func, $id){

$servername = "localhost";
$username = "mypaper_google";
$password = "P@$$9333172315";
$dbname = "msmypaper_google";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

switch ($func) {
	case 'viewusers':
		$data =  viewUsers($conn);
		break;
	case 'assignCreator':
		$data =  assignCreator($conn, $id);
		break;
	case 'assignAdmin':
		$data =  assignAdmin($conn, $id);
		break;
	case 'assignEditor':
		$data =  assignEditor($conn, $id);
		break;
	case 'deleteUser':
		$data =  deleteUser($conn, $id);
		break;
	default:
		$data = array("error" => TRUE, "error_msg" => "Wrong function Name");
		break;


}
return $data;



}

function viewUsers($conn){

	$response = array("error" => FALSE);
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$response["data"]  = array();
	while($data = mysqli_fetch_assoc($result)){

		
		$response["data"][] = array("id" => $data["id"], "status" => $data["status"], "name" => $data["first_name"].' '.$data["last_name"], "email" => $data["email"], "picture" => $data["picture"]);


	}
	

	return json_encode($response);
}
function assignCreator($conn, $userId){

	$response = array("error" => FALSE);
	$sql = "UPDATE users SET `status` = 'Creator' WHERE `id` = $userId";
	$result = mysqli_query($conn, $sql);
	$response["msg"]  = "Role assigned as Question Paper Creator.";
	$response["status"]="Creator";
	

	return json_encode($response);
}
function assignAdmin($conn, $userId){

	$response = array("error" => FALSE);
	$sql = "UPDATE users SET `status` = 'Admin' WHERE `id` = $userId";
	$result = mysqli_query($conn, $sql);
	$response["msg"]  = "Role assigned as Question Paper Admin.";
	$response["status"]="Admin";
	

	return json_encode($response);
}

function assignEditor($conn, $userId){

	$response = array("error" => FALSE);
	$sql = "UPDATE users SET `status` = 'Editor' WHERE `id` = $userId";
	$result = mysqli_query($conn, $sql);
	$response["msg"]  = "Role assigned as Question Paper Editor.";
	$response["status"]="Editor";
	

	return json_encode($response);
}

function deleteUser($conn, $userId){

	$response = array("error" => FALSE);
	$sql = "DELETE FROM users WHERE `id` = $userId";
	$result = mysqli_query($conn, $sql);
	$response["msg"]  = "User Remove.";
	
	

	return json_encode($response);
}
?>