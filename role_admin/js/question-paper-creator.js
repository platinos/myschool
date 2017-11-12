//global count of no of questions selected
var count=0;

// //click event for add button
// $('.questionAdd').click(function () {
// 	var questionID=$(this).parent().attr('id');
// 	addQuestion(questionID);
// });

// //click event for remove button
// $('.questionRemove').click(function () {
// 	var questionID=$(this).parent().attr('id');
// 	removeQuestion(questionID);
// });


//adds question to list and highlights the added question
function addQuestion(questionID){
	$.ajax({
		url: 'question-paper-creator.php',
		type: 'POST',
		data: {questionID: questionID, action:"add_question"},
	})
	.done(function() {	
		$('#'+questionID).css("background-color", "green");
		console.log(questionID+" question id add");
		$('#addQuestion'+questionID).hide();
		$('#removeQuestion'+questionID).show();
		count++;
		$('#create_paper').show();
	})
	.fail(function() {
		alert('An error occured while trying to select question. Please try later');
	})
}

//removes question from list and removes the highlighting
function removeQuestion(questionID){
	$.ajax({
		url: 'question-paper-creator.php',
		type: 'POST',
		data: {questionID: questionID, action:"remove_question"},
	})
	.done(function() {
		$('#'+questionID).css("background-color", "");

		console.log(questionID+" question id delete");
		$('#addQuestion'+questionID).show();
		$('#removeQuestion'+questionID).hide();
		count--;
		if(count==0){
			$('#create_paper').hide();
		}

	})
	.fail(function() {
		alert('An error occured while trying to select question. Please try later');
	})
}

//create paper on click handler
$('#create_paper').click(function() {
	
});