<!DOCTYPE html>
<html>

<head>
    <?php include 'part/head.php'; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
   
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
                            <h2>ADD QUESTIONS</h2>
                           
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
    <div class="col-sm-6">
                                    <div class="btn-group bootstrap-select form-control show-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="-- Please select --" aria-expanded="false"><span class="filter-option pull-left">-- Please select --</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" style="max-height: 447px; overflow: hidden; min-height: 92px;"><ul class="dropdown-menu inner" role="menu" style="max-height: 437px; overflow-y: auto; min-height: 82px;"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">-- Please select --</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">10</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">20</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">30</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">40</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">50</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div>


                                    <select class="form-control show-tick" tabindex="-98" name="class">
                                        <option value="9" selected>IX</option>
                                        <option value="10">X</option>
                                        <option value="11">XI</option>
                                        <option value="12">XII</option>
                                    </select></div>
  </div>

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

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script type="text/javascript">
        
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
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
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
    
</body>

</html>

