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
		array_push(	$_SESSION["questionCart"], $_POST['qid']);
		echo "{'msg':'successfully added id : ".$_POST['qid']."'}";
	}

	function removeQuestion(){
		unset($_SESSION["questionCart"],$_POST['qid']);
		echo "{'msg':'successfully removed'}";
	}
?>