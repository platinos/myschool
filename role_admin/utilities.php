<?php
// If the given question id is present in the cart.
	function incart($qid){
		return array_search($qid, $_SESSION['questionCart']);
	
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
	echo "bleh";
}

?>