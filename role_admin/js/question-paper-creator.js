//global count of no of questions selected
var count=0;

//click event for add button
$('.questionAdd').onclick(function () {
	var questionID=$(this).parent().attr('id');
	addQuestion(questionID);
});

//click event for remove button
$.('.questionRemove').onclick(function () {
	var questionID=$(this).parent().attr('id');
	removeQuestion(questionID);
});


//adds question to list and highlights the added question
function addQuestion(questionID){
	$.ajax({
		url: '../question-paper-creator.php',
		type: 'POST',
		data: {questionID: questionID, action:"add_question"},
	})
	.done(function() {	
		$(this).parent().addClass('success');
		$(this).hide();
		$(this).next().show();
		count++;
		$('#create_paper').show();
	})
	.fail(function() {
		alert('An error occured while trying to select question. Please try later');
	})
}

//removes question from list and removes the highlighting
function removeQuestion(questionID){
	$.$.ajax({
		url: '../question-paper-creator.php',
		type: 'POST',
		data: {questionID: questionID, action:"remove_question"},
	})
	.done(function() {
		$(this).parent().removeClass('success');
		$(this).hide();
		$(this).prev().show();
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