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
		beforeSend: function(){
			toggleAddRemove(questionID);
			$('#create_paper').show();
		}
	})
	.done(function(data){
		data=JSON.parse(data);
		$('#cartCount').html("<div class='alert alert-info' ><strong>"+data.size+"</strong> questions present.</div> ");
	})
	.fail(function() {
		alert('An error occured while trying to select question. Please try after some time.');
		toggleAddRemove(questionID);
		$('#create_paper').hide();
	})
}

//removes question from list and removes the highlighting
function removeQuestion(questionID){
	$.ajax({
		url: 'question-paper-creator.php',
		type: 'POST',
		data: {qid: questionID, action:"remove_question"},
		beforeSend: function(){

			toggleAddRemove(questionID);
			
		}
	})
	.done(function(data){

		data=JSON.parse(data);


		$('#cartCount').html("<div class='alert alert-info' ><strong>"+data.size+"</strong> questions present.</div> ");
			if(data.size==0){
				$('#create_paper').hide();
				$('#cartCount').html('');
			}
	})
	.fail(function() {
		alert('An error occured while trying to remove question. Please try after some time.');
		toggleAddRemove(questionID);
		$('#create_paper').show();
	})
}


//removes question from display-paper
function removeQuestionFromDisplay(questionID){
	$.ajax({
		url: 'question-paper-creator.php',
		type: 'POST',
		data: {qid: questionID, action:"remove_question"},
		beforeSend: function(){

			$('#questionID').hide();
			
		}
	})
	.done(function(data){

		$('#questionID').remove();
		data=JSON.parse(data);
		$('#cartCount').html(data.size+' questions present.');
			if(data.size==0){
				$('#cartCount').html('');
			}
	})
	.fail(function() {
		alert('An error occured while trying to remove question. Please try after some time.');
		$('#questionID').show();
		$('#create_paper').show();
	})
}

function toggleAddRemove(questionID){
	$('#addQuestion'+questionID).toggle();
	$('#removeQuestion'+questionID).toggle();
}



