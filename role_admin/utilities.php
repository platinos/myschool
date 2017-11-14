<?php session_start();
	function incart($qid){
		return array_search($qid, $_SESSION['questionCart']);
	
	}
?>