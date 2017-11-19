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
                    // if(in_array($_FILES['file']['type'],$mimes)){
                    //   // do something
                    // } else {
                    //   echo "Sorry, only csv files are allowed.";
                    //   $uploadOk = 0;
                    // }

                    echo $csvFileType;
                        // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                        
                        $str =  "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                        echo '<div class="alert alert-success"><strong>'.$str.'</strong></div>';
                        $uploaded = 1;
                    }

                    //After file is successfully uploaded
                    // read the file and display contents in datatable
                    if($uploaded == 1){
                        $file = fopen($target_file.".".$csvFileType,"r");

                        var_dump(fgetcsv($file));


                        ?>

                        <table id="allQuestions" class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    
                                    <th>Id</th>
                                    <th>Class</th>
                                    <th>Type</th>
                                    <th>Subject</th>
                                    <th>Chapter</th>
                                    <th>Level</th>
                                    <th>Topic</th>
                                    <th>Marks</th>
                                    <th>Question</th>                                       
                                    <th>Image</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Answer</th>
                                    <th>Tags</th>
                                    <th>Youtube</th>



                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Class</th>
                                    <th>Type</th>
                                    <th>Subject</th>
                                    <th>Chapter</th>
                                    <th>Level</th>
                                    <th>Topic</th>
                                    <th>Marks</th>
                                    <th>Question</th>                                       
                                    <th>Image</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Answer</th>
                                    <th>Tags</th>
                                    <th>Youtube</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                        while(false){
                            $feed = array();
                            $feed = fgetcsv($file);?>
                             <tr>
                                <td> <?php echo $feed[0];?></td>
                                <td> <?php echo $feed[1];?></td>
                                <td> <?php echo $feed[2];?></td>
                                <td> <?php echo $feed[3];?></td>
                                <td> <?php echo $feed[4];?></td>
                                <td> <?php echo $feed[5];?></td>
                                <td> <?php echo $feed[6];?></td>
                                <td> <?php echo $feed[7];?></td>
                                <td> <?php echo $feed[8];?></td>
                                <td> <?php echo $feed[9];?></td>
                                <td> <?php echo $feed[10];?></td>
                                <td> <?php echo $feed[11];?></td>
                                <td> <?php echo $feed[12];?></td>
                                <td> <?php echo $feed[13];?></td>
                                <td> <?php echo $feed[14];?></td>
                                <td> <?php echo $feed[15];?></td>
                                <td> <?php echo $feed[16];?></td>
                                                    
                            </tr>
                            <?php  }
                            ?>
                        </tbody>
                    </table>


                        <?php
                        fclose($file);

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

