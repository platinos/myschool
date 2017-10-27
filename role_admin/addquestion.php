<!DOCTYPE html>
<html>

<head>
    <?php include 'part/head.php'; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
   
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

<form>
    <textarea id="question" name="question">
    Question
</textarea>

<textarea id="answer" name="answer">
    Answer
</textarea>
</form>









<!--  ***************** END FORM ********************** -->








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
<form>
    
 <label class="form-label" >Class</label>
<select class="form-control show-tick" name="class" id="class">
                                        <option value="9" selected>IX</option>
                                        <option value="10">X</option>
                                        <option value="11">XI</option>
                                        <option value="12">XII</option>
                                    </select>
                                    <br><br>

                                    <label class="form-label" >Subject</label>
<select class="form-control show-tick" name="subject" id="subject" onchange="chap_select()">
                                        <option value="chemistry" selected>Chemistry</option>
                                        <option value="physics">Physics</option>
                                        <option value="mathematics">Mathematics</option>
                                        <option value="english">English</option>
                                    </select>
                                    <br><br>
 <label class="form-label">Type</label>
<select name="type" class="form-control show-tick" id="type" onchange="answerbox();">
                  <option value="1">MCQ</option>
                  <option value="2">TRUE/FALSE</option>
                  <option value="3" selected>SHORT ANSWER</option>
                  <option value="4">LONG ANSWER</option>
                  <option value="5">COMPREHENSION</option>
                </select>
<br><br>
 <label class="form-label">Tag</label>
 <input type="text" class="form-control" name="tag" required>
       <br>                              
 <label class="form-label">Chapter</label>
  <select id="chapters" name="chapters" class="form-control" onchange="topic_select()">                                  
    <option value="Motion in 1 D">Motion in 1 D</option>
                              </select>

<br><br>
<label class="form-label">Topic</label>
                              <select id="topic" name="topic" size="6" class="form-control">                                  <option value="Test">Test</option>
                                                                <option value="Test33">Test33</option>
                                                                <option value="test2">test2</option>
                                                                <option value="xyz">xyz</option>
                                                                <option value="test3">test3</option>
                                                                <option value="biomolecules">biomolecules</option>
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
                              <input id="marks" name="marks" type="number" value="" class="form-control input-md">
                              <br>
                              <label class="form-label">Youtube link</label>  
                              <input id="marks" name="marks" type="text" value="" class="form-control input-md">
                              <br>
<input type="submit" id="save" name="save" value="Save Question" class="btn btn-primary btn-lg" onclick='ClickToSave()'/>
</form>






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
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

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
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>




    <script type="text/javascript">


     function chap_select(){
        var form = new FormData();
form.append("func", "getchapters");
form.append("class", "9");
form.append("subject", "Chemistry");

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

  
  var str="";
  for (var i = 0; i < jsonData.data.length; i++) {
    var counter = jsonData.data[i];
    str += "<option value='"+counter.id+"'>"+counter.chapter+"</option>";
}

 alert(str);

$('#here').html(str);
$('#chapters').html(str);



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
        toolbar2: 'print preview media | forecolor backcolor emoticons | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
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
    tinymce.suffix = ".min";
    tinyMCE.baseURL = 'plugins/tinymce';
});


    </script>
    <script type="text/javascript" src="plugins/tinymce/plugins/tiny_mce_wiris/integration/wirislib.js"></script>
    
</body>

</html>

