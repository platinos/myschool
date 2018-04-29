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




//var table=$('#allQuestions1').DataTable();
var prevClass=null,prevSubj=null;

function filter() {
	var c=$('#class').val();
	var type=$('#type').val();
	var difficulty=$('#difficulty').val();
	var chapter=$('#chapters').val();

	//console.log(c+' '+type+' '+difficulty+' '+chapter);

	$.fn.dataTable.ext.search.pop();
	table.draw();

	
	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {

			var classcol=data[0]; 
			var typecol=data[2];
			var chaptercol=data[4]; 
			var difficultycol=data[7]; 

			var noclasspresent=c=='select';
			var notypepresent=type=='select';
			var nodifficultpresent=difficulty=='select';
			var nochapterpresent=chapter=='select';

			if ((noclasspresent || classcol==c) && (notypepresent || typecol==type) && 
				(nochapterpresent|| chaptercol==chapter) && (nodifficultpresent|| difficulty==difficultycol)){
				return true;
		}
		return false;
	});

	table.draw();
}

function chapterload (subject) {

	var subj= subject;
	var c=$('#class').val();
	
	var chapsel=$('#chapters');
	if(subj=='select' ||c=='select'){
		chapsel.attr('disabled', 'true');
		chapsel.empty().append("<option value='select' selected>Select chapter</option>");
		chapsel.css({
			background: 'lightgrey'
		});
	}

	else if(prevClass!=c || prevSubj!=subj){
		chapsel.removeAttr('disabled');
		chapsel.css({
			background: 'white'
		});
		chap_select(subj,c);
	}

	prevClass=c;
	prevSubj=subj;
}


function chap_select(subj, c){
	var form = new FormData();
	form.append("func", "getchapters");
	form.append("class", c);
	form.append("subject", subj);


	var settings = {
		"async": true,
		"url": "functions.php",
		"method": "POST",

		"processData": false,
		"contentType": false,
		"mimeType": "multipart/form-data",
		"data": form
	}

	$.ajax(settings).done(function (response) {
		var jsonData= JSON.parse(response);

		var dataSize = jsonData.size;


		var str="<option value='select' selected>Select chapter</option>";
		for (var i = 0; i < jsonData.data.length; i++) {
			var counter = jsonData.data[i];
			str += "<option value='"+counter.chapter+"'>"+counter.chapter+"</option>";
		}

		$('#chapters').empty().append(str);
	});
}