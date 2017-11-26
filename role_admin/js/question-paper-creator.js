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
		showNotification("bg-green", "Question Successfully added.", "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	
	})
	.fail(function() {
		//alert('An error occured while trying to select question. Please try after some time.');
		toggleAddRemove(questionID);
		$('#create_paper').hide();
		showNotification("alert-warning", 'An error occured while trying to add question. Please try after some time.', "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	
		
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
		showNotification("alert-danger", "Question Successfully removed.", "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	

	})
	.fail(function() {
		//alert('An error occured while trying to remove question. Please try after some time.');
		toggleAddRemove(questionID);
		$('#create_paper').show();
		showNotification("alert-warning", 'An error occured while trying to remove question. Please try after some time.', "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	
		

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
		$('#cartCount').html("<div class='alert alert-info' ><strong>"+data.size+"</strong> questions present.</div> ");
		$('#cartTable').load("qpcarttable.php");
		console.log(data.size+" "+typeof data.size);

		if(data.size==0){
			$('#cartCount').html('');
			$('#cartTable').hide();
			$('#noQues').show();
			$('#create_paper').hide();
		}
		showNotification("alert-danger", "Question Successfully removed.", "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	

	})
	.fail(function() {
		//alert('An error occured while trying to remove question. Please try after some time.');
		$('#questionID').show();
		$('#create_paper').show();
		$('#noQues').hide();
		showNotification("alert-warning", 'An error occured while trying to remove question. Please try after some time.', "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	
		
	})
}

function toggleAddRemove(questionID){
	$('#addQuestion'+questionID).toggle();
	$('#removeQuestion'+questionID).toggle();
}



//modal opening helper
$('#finalise').on('click', function () {
	var color = $(this).data('color');
	$('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	$('#mdModal').modal('show');
});

//display paper convert session array to string
function sessiontostring(){
	$.getJSON('display-paper-submit.php', function(json, textStatus) {
		var str=json.str;
		$('#qlist').val(str);
			//console.log(str+"asdfasdf");
			$('#paperdetails').submit();
		});
}

//sending bulk questions to php
function submitAll(file) {
	$("#upload_questions").hide();
	$("#allQuestions").hide();
	$("#loading").show();
	$("#successMsg").hide();

	$.ajax({
		url: 'utilities.php',
		type: 'GET',
		data: {'addQuestionsFromCsv': file}
	})
	.done(function(data) {
		$("#loading").hide();
		data=JSON.parse(data);
		showNotification("bg-green", data.added+" Questions Successfully added.", "top", "right", "animated bounceInRight", "animated bounceOutRight");
		if(data.notAdded > 0)
			showNotification("bg-danger", data.notAdded+" Questions could not be added.", "top", "right", "animated bounceInRight", "animated bounceOutRight");
	})
	.fail(function() {
		$("#upload_questions").show();
		showNotification("alert-warning", 'An error occured while trying to insert questions. Please try after some time.', "bottom", "right", "animated bounceInRight", "animated bounceOutRight");	
	});
	
}


$.fn.dataTable.Api.register( 'order.neutral()', function () {
	return this.iterator( 'table', function ( s ) {
		s.aaSorting.length = 0;
		s.aiDisplay.sort( function (a,b) {
			return a-b;
		} );
		s.aiDisplayMaster.sort( function (a,b) {
			return a-b;
		} );
	} );
} );

var table=$('#allQuestions').DataTable();

function filterSubj() {
	var s=$('#subj').val();
	var reset=false;
	console.log(s+" selected");
	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {

        var col = ( data[4] ); // use data for the subj column

        if(s=='select'){
        	reset=true;
        }

        if (col == s)
        {
        	return true;
        }
        return false;
    });

    if(reset==true){
    	table.order.neutral().draw();
    }

	table.draw();
}


function filterClass() {
	var s=$('#class').val();
	console.log(s+" selected");
	var reset=false;
	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {

        var col = ( data[2] ); // use data for the subj column

        if(s=='select'){
  	    	$.fn.dataTable.ext.search.pop();
        }

        if (col == s)
        {
        	return true;
        }
        return false;
    });


    if(reset==true){
    	table.order.neutral().draw();
    }
    else
		table.draw();
}