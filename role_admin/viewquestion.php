<!DOCTYPE html>
<html>

<head>
    <?php include 'part/head.php'; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <title>MyPaper-Controller | View All Questions</title>

    <!-- Favicon-->

</head>

<?php include 'part/body.php'; ?>
<?php include 'part/nav.php'; ?>

<?php
$feed = apicall("viewquestion");
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

            <!-- Basic Examples -->
            
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                         <h2>
                            ALL QUESTIONS SELECTION
                        </h2>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                    <th>QR</th>
                                    <th>Answer</th>
                                    <th>Youtube</th> 
                                    <th>Action</th>



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
                                    <th>QR</th>
                                    <th>Answer</th>
                                    <th>Youtube</th> 
                                    <th>Action</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                $size = $feed['data']['size']; 
                                for($i=0; $i<$size; $i++)
                                    {?>
                                            <tr id=" <?php echo $feed['data'][$i]['id'] ?>" >
                                               
                                        <td><?php echo ($i+1) ?></td>
                                        <td><?php echo $feed['data'][$i]['class'] ?></td>
                                        <td><?php echo $feed['data'][$i]['type'] ?></td>
                                        <td><?php echo $feed['data'][$i]['subject'] ?></td>
                                        <td><?php echo $feed['data'][$i]['chapter'] ?></td>
                                        <td><?php echo $feed['data'][$i]['level'] ?></td>
                                        <td><?php echo $feed['data'][$i]['topic'] ?></td>
                                        <td><?php echo $feed['data'][$i]['marks'] ?></td>
                                        <td><?php echo htmlspecialchars_decode($feed['data'][$i]['ques_txt']) ?></td>
                                        <td>
                                           <a target="_blank" href = "<?php echo $feed['data'][$i]['ques_img'] ?>" class = "thumbnail">
                                            <img alt="<?php echo $feed['data'][$i]['ques_img'] ?>" src="<?php echo $feed['data'][$i]['ques_img'] ?>">
                                        </a>
                                    </td>

                                    <td>
                                       <a target="_blank" href = "https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $feed['data'][$i]['qr'] ?>"  >
                                        <img hieght="100" width="100" alt="QR" src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $feed['data'][$i]['qr'] ?>">
                                    </a>
                                </td>

                                <td><?php echo htmlspecialchars_decode($feed['data'][$i]['answer']) ?></td>
                                <td><a target="_blank" href="<?php echo $feed['data'][$i]['youtube'] ?>"><?php echo $feed['data'][$i]['youtube'] ?></a></td>


                                <td><a href="fdaf"><i class="material-icons" style="color: Blue">edit</i></a>     &nbsp;&nbsp;&nbsp;
                                    <a onclick="window.open('functions.php?func=deletequestion&qid=<?php echo $feed['data'][$i]['id'] ?>','_BLANK');setTimeout(location.reload.bind(location), 2000);"><i class="material-icons" style="color: red">delete</i></a>
                                </td>


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

