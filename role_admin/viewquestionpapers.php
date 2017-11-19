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

            $feed = apicall("viewquestionpaper");
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

                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Created Question Papers
                            </h2>
                            
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable" id="questionPaperTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Created On</th>
                                    <th>Duration</th>
                                    <th>Marks</th>
                                    <th>Action</th>
                                    


                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>Id</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Created On</th>
                                    <th>Duration</th>
                                    <th>Marks</th>
                                    <th>Action</th>

                               </tr>
                           </tfoot>
                           <tbody>
                            <?php

                            $size = $feed['size']; 
                            for($i=0; $i<$size; $i++)
                                {?>
                                    <tr>
                                        <?php $id=$feed['data'][$i]['id'] ?>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $feed['data'][$i]['name'] ?></td>
                                        <td><?php echo $feed['data'][$i]['class'] ?></td>
                                        <td><?php echo $subject=$feed['data'][$i]['subject'] ?></td>
                                        <td><?php echo $date=$feed['data'][$i]['date'] ?></td>
                                        <td><?php echo $time=$feed['data'][$i]['time'] ?></td>
                                        <td><?php echo $fmarks=$feed['data'][$i]['marks'] ?></td>
                                        <?php $querystr='qp_id='.$id.'&date='.$date.'&time='.$time.'&fmarks='.$fmarks.'&subject='.$subject?>
                                        <td><a href="<?php echo 'viewcurrentpaper.php?'.$querystr ?>" ><button class='btn btn-primary waves-effect'><i class="material-icons">print</i> Print</button>
                                        </a></td>                                      

                                    </tr>
                                    <?php  }
                                    ?>
                                </tbody>
                            </table>
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

