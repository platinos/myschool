<!DOCTYPE html> 
<html>

<head>
    <?php include 'part/head.php'; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/animate-css/animate.css" rel="stylesheet">
    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">


                       <h2>
                        Bulk Upload Questions.
                    </h2>

                </div>
                <div class="body">
                 <?php 
                 if(isset($_POST["submitVal"])){
                        //if file is uploaded

                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $uploadOk = 1;
                    $csvFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                        //Allow certain file formats

                    $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                    if(in_array($_FILES['file']['type'],$mimes)){
                      // do something
                    } else {
                      echo "Sorry, only csv files are allowed.";
                      $uploadOk = 0;
                    }

                        // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                    }



                }
                else{
                    ?>


                    <!-- form here --> 
                    <form action="bulkuploader.php" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                                <i class="material-icons">touch_app</i>
                            </div>
                            <h3>Drop files here or click to upload CSV file.</h3>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple accept=".csv"/>
                        </div>
                        <input type="hidden" name="submitVal" value="2">

                    </form>
                    <br>
                    <br>
                    <button type="button" class="btn btn-info waves-effect" onclick="document.getElementById('frmFileUpload').submit();">Submit</button>


                    <?php
                }
                ?>

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
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
<!-- Dropzone Plugin Js -->
<script src="plugins/dropzone/dropzone.js"></script>


<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<script src="js/notifications.js"></script>
<!-- <script src="js/pages/forms/advanced-form-elements.js"></script> -->

<!-- Demo Js -->
<script src="js/demo.js"></script>
<script src="js/question-paper-creator.js" type="text/javascript" charset="utf-8" async defer></script>
</body>

</html>

