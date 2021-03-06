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

        <!-- Basic Examples -->
        
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->



        <div class="row clearfix">
            <?php
            $qp_id=$_GET['qp_id'];
            $feed = apicall("getquestionpaperbyid",array("qp_id"=>$qp_id));
            if($feed['error']==true)
            {
                ?>
                <div class="alert alert-danger">
                    <h2><b><strong>Oh snap!</strong></b> <?php echo $feed['error_msg'];?></h2>
                </div>
                <?php
            }
            else
            {
                ?>
                <!--  answer key and question paper switch button -->
                <button class="btn btn-primary waves-effect pull-right" id="answerkeybutton">View Answer Key</button>
                <button class="btn btn-primary waves-effect pull-right" id="questionpaperbutton" style='display: none;'>Go back to Question Paper</button>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                    <textarea id="questionpaper" name="questionpaper">
                        <?php include 'templatehead.php'; ?>
                        <?php $answerkey=""; ?>
                        <?php include 'templatebody.php'; ?>
                    </textarea>

                    <textarea name="answerkey"" id="answerkey" name="answerkey">
                       <?php
                            echo $answerkey;
                       ?> 
                   </textarea>

               </div>
           </div>
           <!-- #END# Exportable Table -->
       </div>
   </section>
   <?php
}
?>

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
<script src="js/currentpaper.js"></script>

<script>


    $(function () {





//TinyMCE
tinymce.init({
    selector: "textarea#questionpaper",
    theme: "modern",
    height: screen.availHeight,
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


//TinyMCE
tinymce.init({
    selector: "textarea#answerkey",
    theme: "modern",
    height: screen.availHeight,
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

