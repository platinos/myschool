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
		data: {qid: questionID, action: "add_question"},
	})
	.done(function(data) {
		$('#'+questionID).css("background-color", "green");
		console.log(questionID+" question id add");
		$('#addQuestion'+questionID).hide();
		$('#removeQuestion'+questionID).show();

		$('#create_paper').show();
		alert(data);
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
		data: {qid: questionID, action:"remove_question"},
	})
	.done(function(data) {

		$('#'+questionID).css("background-color", "");

		console.log(questionID+" question id delete");
		$('#addQuestion'+questionID).show();
		$('#removeQuestion'+questionID).hide();
		console.log('data size: '+data+' '+data.size+' '+typeof data.size)
		if(data.size==0){
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