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
    {



        ?>

        <section class="content">
            <div class="container-fluid">

             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD CHAPTER</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" action="" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="chap" required>
                                        <label class="form-label">Name of The Chapter</label>
                                    </div>
                                </div>

                                <label class="form-label" >Subject</label>
                                <label class="form-label" >Subject</label>
                                <select class="form-control show-tick" name="subj" id="subj">
                                    <option value="select" selected>Select</option>
                                    <?php

                                    $size = $feed['data']['size']; 
                                    for($i=0; $i<$size; $i++)
                                        {?>

                                           <option value=<?php echo $feed['data'][$i]['name'] ?> ><?php echo $feed['data'][$i]['name'] ?></option>
                                           <?php  }
                                           ?>

                                       </select>
                                       <br>
                                       <br>

                                       <label class="form-label" >Class</label>
                                       <select class="form-control show-tick" name="clas" id="class">
                                        <option value="9" selected>IX</option>
                                        <option value="10">X</option>
                                        <option value="11">XI</option>
                                        <option value="12">XII</option>
                                    </select>

                                    <BR>
                                    <BR>

                                    
                                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                </form>
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
     <?php
 }
 ?>

 <!-- Jquery Core Js -->
 <script src="plugins/jquery/jquery.min.js"></script>

 <!-- Bootstrap Core Js -->
 <script src="plugins/bootstrap/js/bootstrap.js"></script>

 <!-- Select Plugin Js -->


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

