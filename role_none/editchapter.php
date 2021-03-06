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
                if(isset($_POST['chap']) && !empty($_POST['chap'])) {
                    $values = array(
                        'ch_id' => $_GET['ch_id'],
                        'chapter_name' => $_POST['chap'],    
                        'subject' => $_POST['subj'],    
                        'class' => $_POST['clas'],    
                    );
                    $feedSend = apicall("editchapter", $values);

                    if($feedSend['error']==true)
                    {
                        ?>
                        <script>
                         alert('Unable to update Chapter Details '.<? echo $feedSend['error_msg']?>);
                         </script>  <?php   


                      }
                      else
                      {
                        ?>
                      
                         <script>
                         alert('Chapter Details Sucessfully Updated');
                         </script>
                                              <?php
                 }
             }
           
             ?>

    <?php

    $value = array("ch_id"=>$_GET['ch_id']);
    $feed = apicall("getchapterbyid",$value);
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
                            <h2>EDIT CHAPTER</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" action="" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line" id="name_header">
                                  <?php echo '<input type="text" id="chap_name" class="form-control" name="chap"  value="'.$feed["data"][0]["chapter"].'" required>';?>
                                      
                                        <label class="form-label">Name of The Chapter</label>
                                    </div>
                                </div>

                                
                                <label class="form-label" >Subject</label>
                                <select class="form-control show-tick" name="subj" id="subj">
                                    <option value="select" selected>Select</option>
                                    <?php
                                  $feedChapter=apicall("viewsubject");
                                    $size = $feedChapter['data']['size']; 
                                    for($i=0; $i<$size; $i++)
                                        {?>

                                           <option value=<?php echo $feedChapter['data'][$i]['name'] ?> ><?php echo $feedChapter['data'][$i]['name'] ?></option>
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

 <script>  

    var name="<?php echo $feed['data'][0]['chapter']; ?>";

    var subject="<?php echo $feed['data'][0]['subject'] ?>";
    var clas="<?php echo $feed['data'][0]['class'] ?>";
    $('#chap_name').val(name);
    $('#name_header').addClass('focused');
    $('#subj').val(subject).prop('selected',true);
    $('#class').val(clas).prop('selected',true);

 </script>

</body>

</html>