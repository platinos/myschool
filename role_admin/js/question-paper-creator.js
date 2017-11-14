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
		$('#cartCount').html(data.size+' questions present.');
	})
	.fail(function() {
		alert('An error occured while trying to select question. Please try later');
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
		$('#cartCount').html(data.size+' questions present.');
			if(data.size==0){
				$('#create_paper').hide();
				$('#cartCount').html('');
			}
	})
	.fail(function() {
		alert('An error occured while trying to select question. Please try later');
		toggleAddRemove(questionID);
		$('#create_paper').show();
	})
}

function toggleAddRemove(questionID){
	$('#addQuestion'+questionID).toggle();
	$('#removeQuestion'+questionID).toggle();
}



//for data table
$(document).ready(function() {
    $('#allQuestions').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );