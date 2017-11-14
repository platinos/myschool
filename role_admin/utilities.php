<?php
	function incart($qid){
		return array_search($qid, $_SESSION['questionCart']);
	
	}
	function displayPaperButton()
	{
		return (isset($_SESSION['questionCart']) && !empty($_SESSION['questionCart']));
	}
?>