<?php
	session_start();
	if(!isset($_SESSION["questionCart"]))
	$_SESSION["questionCart"]=array();

	switch($_POST['action']){
		case "add_question":
			addQuestion();
			break;
		case "remove_question":	
			removeQuestion();
			break;
	}


	function addQuestion(){
		$_SESSION["questionCart"][$_POST['qid']] = $_POST['qid'];
		$response['msg'] = 'successfully added id : '.$_POST["qid"];
		$response['size'] = count($_SESSION["questionCart"]);
		echo json_encode($response);
	}

	//apply null check
	function removeQuestion(){
		unset($_SESSION["questionCart"][$_POST['qid']]);
		$response['msg'] = 'successfully removed id : '.$_POST["qid"];
		$response['size'] = count($_SESSION["questionCart"]);
		echo json_encode($response);
	}
?>