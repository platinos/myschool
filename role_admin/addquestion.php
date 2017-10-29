<!DOCTYPE html>
<html>

<head>
	<?php include 'part/head.php'; ?>
	<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="http://rudrai.com/mypaper/role_admin/plugins/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	<!-- <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->

	<title>MyPaper-Controller</title>

	<!-- Favicon-->

</head>

<?php include 'part/body.php'; ?>
<?php include 'part/nav.php'; ?>
<section class="content">
	<div class="container-fluid">

		<div class="row clearfix">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<div class="card">
					<div class="header">
						<h2 id="here">ADD QUESTIONS</h2>

					</div>
					<div class="body">









						<!-- ***************** FORM **********************-->
						<!-- Middle Column -->

						<form method="POST" action='' enctype="multipart/form-data">

							<textarea id="question" name="question">
								Question
							</textarea>

							<div id=1>
								<textarea id="answer" name="answer">
									Answer
								</textarea>
							</div>

							<div id=2>
								<br>
								<br>
								<input name="group" type="radio" id="true" value="true" checked />
								<label for="true" id="true" >True</label>  <BR>
								<input name="group" type="radio" value="false" id="false" />
								<label for="false" id="false">False</label>

							</div> 

							<div id=3>
								<textarea id="mcq1" name="mcq1">
									option -1 - please place your correct answer in this field
								</textarea>

								<textarea id="mcq2" name="mcq2">
									option -2
								</textarea>

								<textarea id="mcq3" name="mcq3">
									option -3
								</textarea>

								<textarea id="mcq4" name="mcq4">
									option -4
								</textarea>
							</div>

						</div>
					</div>
				</div>



				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<div class="card">
						<div class="header">
							<h2>QUESTION ATTRIBUTES</h2>

						</div>
						<div class="body">



							<!-- ***************** FORM **********************-->

							<!-- Right Column -->


							<label class="form-label" >Class</label>
							<select class="form-control show-tick" name="class" id="class">
								<option value="9" selected>IX</option>
								<option value="10">X</option>
								<option value="11">XI</option>
								<option value="12">XII</option>
							</select>
							<br><br>

							<label class="form-label" >Subject</label>

							<?php

							$feed = apicall("viewsubject");
							if($feed['error']==true)
							{
								?>
								<div class="alert alert-danger">
									<h2><b><strong>Oh snap!</strong></b> <?php echo $feed['error_msg'];?></h2>
								</div>
								<?php   


							}
							else
								{?>
									<select class="form-control show-tick" name="subject" id="subject" onchange="chap_select()">
										<option value="select" selected>Select</option>
										<?php
										$size = $feed['data']['size']; 
										for($i=0; $i<$size; $i++)
											{?>

												<option value=<?php echo $feed['data'][$i]['name'] ?> ><?php echo $feed['data'][$i]['name'] ?></option>
												<?php  
											}

											?>

										</select>

										<?php
									}
									?>
									<br><br>

									<label class="form-label">Type</label>
									<select name="type" class="form-control" id="type" onchange="just_change(this.value)">                  
										<option value="1">MCQ</option>
										<option value="2">TRUE/FALSE</option>
										<option value="3" selected>SHORT ANSWER</option>
										<option value="4">LONG ANSWER</option>
										<option value="5">COMPREHENSION</option>
									</select>
									<br><br>

									<label class="form-label">Tag</label>
									<input type="text" class="form-control" name="tag" >
									<br>                 

									<label class="form-label">Chapter</label>
									<select id="chapters" name="chapters" class="form-control" onchange="topic_select()">
										<option value="Motion in 1 D">Loading...</option>
									</select>
									<br><br>

									<label class="form-label">Topic</label>
									<select id="topic" name="topic" size="6" class="form-control"> 
										<option value="Test">Loading...</option>              
									</select>    
									<br><br>

									<label class="form-label">Level</label>
									<select id="level" name="level" size="4" class="form-control">
										<option value="1">Easy</option>
										<option value="2">Medium</option>
										<option value="3">Tough</option>
										<option value="4">HOTS</option>
									</select>   
									<br><br>

									<label class="form-label">Marks alloted</label>  
									<input id="marks" name="marks" required type="number" value="" class="form-control input-md">
									<br>

									<label class="form-label">Youtube link</label>  
									<input id="link" name="link" required type="text" value="" class="form-control input-md">
									<br>

									<label class="form-label">Scanned Copy</label>  
									<input type="file" name="file_upload" id="upload" required accept="image/*">
									<br>

									<input type="submit" id="submit" name="submit" value="Save Question" class="btn btn-primary btn-lg" onclick='ClickToSave()'/>
								</form>


								<?php
								if(isset($_POST['submit']) && !empty($_POST['submit'])) {

									$t=time();
									$new = date("Y-m-d-H-i-sa",$t);
									$fileName = $_FILES["file_upload"]["name"];
$splitName = explode(".", $fileName); //split the file name by the dot
$fileExt = end($splitName); //get the file extension
$newFileName  = strtolower($new.'.'.$fileExt); //join file name and ext.

if(move_uploaded_file($_FILES['file_upload']['tmp_name'], 'scan/'.$newFileName))
{

	if($_POST['type']==1)
	{
		$ans = $_POST['mcq1'];
	}
	else if($_POST['type']==2)
	{
		$ans = $_POST['group'];
	}
	else
	{
		$ans = $_POST['answer'];
	}


	$values = array(
		'question' => $_POST['question'],    
		'answer' => $ans,    
		'truefalse' => $_POST['group'],  
		'mcq1' => $_POST['mcq1'],  
		'mcq2' => $_POST['mcq2'],  
		'mcq3' => $_POST['mcq3'], 
		'mcq4' => $_POST['mcq4'], 
		'class' => $_POST['class'], 
		'subject' => $_POST['subject'], 
		'type' => $_POST['type'], 
		'tag' => $_POST['tag'], 
		'chapter' => $_POST['chapters'], 
		'topic' => $_POST['topic'], 
		'level' => $_POST['level'], 
		'marks' => $_POST['marks'], 
		'link' => $_POST['link'], 
		'file' => 'scan/'.$newFileName,
	);

	
	$feed = apicall("addquestions", $values);
	if($feed['error']==true)
	{
		?>
		<div class="alert alert-danger">
			<h2> <b><strong>Oh snap!</strong></b> <?php echo $feed['error_msg'];?></h2>
			<?php   


		}
		else
		{
			?>
			<div class="alert alert-info">
				<h2><b><strong>Chapter Details Sucessfully Added</strong></b></h2>
			</div>
			<?Php

		}


	}

	else
	{
		echo 'file upload error';
	}





}

?>

<!--  ***************** END FORM ********************** -->








</div>
</div>
</div>





</div>

<!-- #END# Exportable Table -->
</div>
</section>


<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<!--  <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- TinyMCE -->
<script src="plugins/tinymce/tinymce.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<!--  <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

<!-- Demo Js -->
<script src="js/demo.js"></script>




<script type="text/javascript">

	$(document).ready(function(){

		$("#1").show();
		$("#2").hide();
		$("#3").hide();   
	});



	function just_change() {
// body...

var value = document.getElementById("type").value;

if(value =="3"||value =="4"||value =="5")
{
	$("#1").show();
	$("#2").hide();
	$("#3").hide();  
}

else if(value=="1")
{
	$("#1").hide();
	$("#2").hide();
	$("#3").show();  
}
else if(value=="2")
{
	$("#1").hide();
	$("#2").show();
	$("#3").hide();  
}
}





function topic_select(){
	var form = new FormData();
	form.append("func", "gettopics");
	form.append("ch_id", document.getElementById("chapters").value);


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
		var jsonData1= JSON.parse(response);

		var dataSize = jsonData1.data.size;


		var str="";
		for (var i = 0; i < dataSize; i++) {
			var counter = jsonData1.data[i];
			str += "<option value='"+counter.topic+"'>"+counter.topic+"</option>";

		}



//$('#here').html(str);

var select = $('#topic');
select.empty().append(str);



});

}  

function chap_select(){
	var form = new FormData();
	form.append("func", "getchapters");
	form.append("class", document.getElementById("class").value);
	form.append("subject", document.getElementById("subject").value);

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


		var str="<option value=select>Select</option>";
		for (var i = 0; i < jsonData.data.length; i++) {
			var counter = jsonData.data[i];
			str += "<option value='"+counter.id+"'>"+counter.chapter+"</option>";
		}


//alert(str);

//$('#here').html(str);

var select = $('#chapters');
select.empty().append(str);



});

}  

$(function () {





//TinyMCE
tinymce.init({
	selector: "textarea#question",
	theme: "modern",
	height: 200,
	plugins: [
	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	'searchreplace wordcount visualblocks visualchars code fullscreen',
	'insertdatetime media nonbreaking save table contextmenu directionality',
	'emoticons template paste textcolor colorpicker textpattern imagetools tiny_mce_wiris'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons | tiny_mce_wiris_formulaEditor',
	image_advtab: true
});

tinymce.init({
	selector: "textarea#answer",
	theme: "modern",
	height: 200,
	plugins: [
	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	'searchreplace wordcount visualblocks visualchars code fullscreen',
	'insertdatetime media nonbreaking save table contextmenu directionality',
	'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true
});

tinymce.init({
	selector: "textarea#mcq1",
	theme: "modern",
	height: 100,
	plugins: [
	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	'searchreplace wordcount visualblocks visualchars code fullscreen',
	'insertdatetime media nonbreaking save table contextmenu directionality',
	'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true
});

tinymce.init({
	selector: "textarea#mcq2",
	theme: "modern",
	height: 100,
	plugins: [
	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	'searchreplace wordcount visualblocks visualchars code fullscreen',
	'insertdatetime media nonbreaking save table contextmenu directionality',
	'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true
});

tinymce.init({
	selector: "textarea#mcq3",
	theme: "modern",
	height: 100,
	plugins: [
	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	'searchreplace wordcount visualblocks visualchars code fullscreen',
	'insertdatetime media nonbreaking save table contextmenu directionality',
	'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true
});

tinymce.init({
	selector: "textarea#mcq4",
	theme: "modern",
	height: 100,
	plugins: [
	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	'searchreplace wordcount visualblocks visualchars code fullscreen',
	'insertdatetime media nonbreaking save table contextmenu directionality',
	'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true
});

tinymce.suffix = ".min";
tinyMCE.baseURL = 'plugins/tinymce';
});


</script>

<script src="plugins/tinymce/plugins/tiny_mce_wiris/core/WIRISplugins.js"></script>

</body>

</html>

