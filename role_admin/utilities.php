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

	include 'config.php';
	$added = 0;
	$notAdded = 0;
	$target_file = "uploads/".$_GET['addQuestionsFromCsv'];
	$file = fopen($target_file,"r");
	fgetcsv($file);
    while(! feof($file)){
    	//$feed[2]; // convert to type int;
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
    echo "{
    	'added' : ".$added.",
    	'notAdded' : ".$notAdded."
    }";
                            

}

?>