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

                <form method="POST" action='' enctype="multipart/form-data">

                    <textarea id="question" name="question">
                        Question
                    </textarea>


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
                </form>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div id='questionPaper'>
                        <?php include 'printformat.html'; ?>
                    </div>

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

<!-- Custom Js -->

<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

</body>

</html>

