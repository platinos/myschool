<!DOCTYPE html>
<html>

<head>
    <?php include 'part/head.php'; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
   
<title>MyPaper-Controller</title>

    <!-- Favicon-->

</head>

<?php include 'part/body.php'; ?>
<?php include 'part/nav.php'; ?>

<section class="content">
        <div class="container-fluid">
          
           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD QUESTIONS</h2>
                           
                        </div>
                        <div class="body">
                            
<!-- form body -->
<form method="post">
            <textarea name="question" id="question" rows="5" cols="50">
                          </textarea>
            <script>CKEDITOR.replace('question',{filebrowserBrowseUrl:'ckfinder/ckfinder.html',filebrowserImageBrowseUrl:'ckfinder/ckfinder.html?type=Images',filebrowserFlashBrowseUrl:'ckfinder/ckfinder.html?type=Flash',filebrowserUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',filebrowserImageUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',filebrowserFlashUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'});CKFinder.setupCKEditor(editor,'');</script>
            <br>
            <h2>Answer</h2>
            <div id="ans">
           <textarea name="answer" id="answer" rows="5" cols="10">
                            </textarea>

            <script>CKEDITOR.replace('answer',{filebrowserBrowseUrl:'ckfinder/ckfinder.html',filebrowserImageBrowseUrl:'ckfinder/ckfinder.html?type=Images',filebrowserFlashBrowseUrl:'ckfinder/ckfinder.html?type=Flash',filebrowserUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',filebrowserImageUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',filebrowserFlashUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'});answerbox();</script>
          </div>

            <br>
            

        </form>
                 </div><!-- /col-lg-9 END SECTION MIDDLE -->
                    
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT {Question Attributes}
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    
            <h3>QUESTION ATTRIBUTES</h3>
                                        

                      <form class="form-horizontal style-form" name="ques_attr" id="ques_attr" method="post">
              <BR>
               
               <input type="hidden" id="entrytype" value="new">              <input type="hidden" name="subject" id="subject" value="physics">
              <!-- Text input-->
               <div class="form-group">
                <label class="col-md-4 control-label" for="class">Class</label>
                <div class="col-md-6">
                <h4>
                <select id="qclass" name="qclass" size="4" class="form-control" onchange="chap_select()">
                <option value="9" selected>IX</option>
                <option value="10">X</option>
                <option value="11">XI</option>
                <option value="12">XII</option>
                </select>
                </h4>
                </div>
                </div>
            

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="selectbasic">Type</label>
              <div class="col-md-9">
                <select id="type" name="type" size="5" class="form-control" onchange="answerbox();">
                  <option value="1">MCQ</option>
                  <option value="2">TRUE/FALSE</option>
                  <option value="3" selected>SHORT ANSWER</option>
                  <option value="4">LONG ANSWER</option>
                  <option value="5">COMPREHENSION</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="tag">Tags</label>  
              <div class="col-md-6">
              <input id="tag" name="tag" type="text" placeholder="" class="form-control input-md">
             </div>
            </div>
             <!-- Text input-->
            <div id="chap_sel" class="form-group">
              <label class="col-md-4 control-label" for="tag">Chapter</label>  
              <div class="col-md-6">
                 <select id="chapter" name="chapter" size="1" class="form-control" onchange="topic_select()">                                  <option value="Motion in 1 D">Motion in 1 D</option>
                              </select>                         

              
             </div>
            </div>


            <!-- Text input-->
            <div class="form-group" id="topic_sel">
              <label class="col-md-4 control-label" for="topic">Topic</label>  
              <div class="col-md-6">
<select id="topic" name="topic" size="6" class="form-control">                                  <option value="Test">Test</option>
                                                                <option value="Test33">Test33</option>
                                                                <option value="test2">test2</option>
                                                                <option value="xyz">xyz</option>
                                                                <option value="test3">test3</option>
                                                                <option value="biomolecules">biomolecules</option>
                              </select>                         


              
             </div>
            </div>



           

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">level</label>
              <div class="col-md-6">
                <select id="level" name="level" size="4" class="form-control">
                  <option value="1">Easy</option>
                  <option value="2">Medium</option>
                  <option value="3">Tough</option>
                  <option value="4">HOTS</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">marks alloted</label>  
              <div class="col-md-6">
              <input id="marks" name="marks" type="number" value="" class="form-control input-md">
             
              </div>
            </div>

           <input type="submit" id="save" name="save" value="Save Question" class="btn btn-primary btn-lg" onclick='ClickToSave()'/>
          
          
            </form>

                          </div>
                          


<!-- end form body -->





                        </div>
                    </div>
                </div>
            </div>
            <?php
if(isset($_POST['chap']) && !empty($_POST['chap'])) {
    $values = array(
    'chapter_name' => $_POST['chap'],    
    'subject' => $_POST['subj'],    
    'class' => $_POST['clas'],    
  );
$feed = apicall("addchapter", $values);

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
?>
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
     <script src="plugins/tinymce/tinymce.js"></script>
<script src="js/pages/forms/editors.js"></script>
    <!--  <script src="plugins/ckeditor/ckeditor.js"></script> -->
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    
</body>

</html>
