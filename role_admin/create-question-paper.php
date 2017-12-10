<!DOCTYPE html> 
<html>

<head>
    <?php include 'part/head.php'; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/animate-css/animate.css" rel="stylesheet">
    <title>MyPaper-Controller</title>
   
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

                            <?php
                            if(displayPaperButton()){
                                ?>

                                <ul class="header-dropdown m-r--5"> 
                                <li><?php include 'selectchapter.php'; ?></li>
                                <li><?php include 'selectdifficulty.html'; ?></li>
                                <li><?php include 'selectquestype.html'; ?></li>
                                <li><?php include 'selectclass.html'; ?></li>
                                 <li><?php include 'selectsubject.php'; ?></li>
                                    <li class="dropdown">

                                     <a href='display-paper.php'><button type="button" class="btn btn-primary waves-effect" id="create_paper"> Create Paper</button></a>
                                 </li>
                             </ul>

                             <?php } else { ?>
                                 <ul class="header-dropdown m-r--5">
                                <li><?php include 'selectchapter.php'; ?></li>
                                <li><?php include 'selectdifficulty.html'; ?></li>
                                <li><?php include 'selectquestype.html'; ?></li>
                                <li><?php include 'selectclass.html'; ?></li>
                                 <li><?php include 'selectsubject.php'; ?></li>
                                    <li class="dropdown">
                                    <a href='display-paper.php'><button type="button" style='display: none;' class="btn btn-primary waves-effect" id="create_paper"> Create Paper</button></a>
                                 </li>
                                 
                             </ul>

                             <?php } ?>
                             <h2>
                                ALL QUESTIONS SELECTION
                            </h2>

                        </div>
                        <div class="body">
                            <table id="allQuestions" class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th class="hide">Class</th>
                                        <th>Question</th>                                       
                                        <th class="hide">Type</th>
                                        <th class="hide">Subject</th>
                                        <th class="hide">Chapter</th>
                                        <th class="hide">Topic</th>
                                        <th class="hide">Marks</th>
                                        <th class="">Level</th>
                                        <th>Select</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                    <!--
                                    1.mcq
                                    2.t/f 
                                    3.short
                                    4.long
                                    5.comprehension.-->

                                        <th class="hide">Class</th>
                                        <th>Question</th>                                       
                                        <th class="hide">Type</th>
                                        <th class="hide">Subject</th>
                                        <th class="hide">Chapter</th>
                                        <th class="hide">Topic</th>
                                        <th class="hide">Marks</th>
                                        <th class="">Level</th>
                                        <th>Select</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $size = $feed['data']['size']; 
                                    for($i=0; $i<$size; $i++)
                                        {?>
                                            <tr id=" <?php echo $feed['data'][$i]['id'] ?>" >
                                            <td class="hide"><?php echo $feed['data'][$i]['class'] ?></td>
                                            <td><?php echo htmlspecialchars_decode($feed['data'][$i]['ques_txt']) ?></td>
                                            
                                            <td class="hide"><?php echo mapQuesType($feed['data'][$i]['type']); ?></td>
                                            <td class="hide"><?php echo $feed['data'][$i]['subject'] ?></td>
                                            <td class="hide"><?php echo $feed['data'][$i]['chapter'] ?></td>
                                            <td class="hide"><?php echo $feed['data'][$i]['topic'] ?></td>
                                            <td class="hide"><?php echo $feed['data'][$i]['marks'] ?></td>
                                            <td class=""><?php echo mapDifficulty($feed['data'][$i]['level']); ?></td>
                                            

                                            <td>
                                                    <?php if(incart($feed['data'][$i]['id'])){
                                                        ?>
                                                        <button class='btn btn-danger waves-effect' id="<?php echo 'removeQuestion'.$feed['data'][$i]['id'] ?>" onclick='removeQuestion(<?php echo $feed['data'][$i]['id'] ?>)'>Remove</button>
                                                        <button style="display: none;" class='btn btn-success waves-effect' 
                                                        id="<?php echo 'addQuestion'.$feed['data'][$i]['id'] ?>" 
                                                        onclick='addQuestion(<?php echo $feed['data'][$i]['id'] ?>)'>
                                                        Add to my paper
                                                    </button>
                                                    <?php
                                                }
                                                else{ ?>
                                                    <button style="display: none;" class='btn btn-danger waves-effect' id="<?php echo 'removeQuestion'.$feed['data'][$i]['id'] ?>" onclick='removeQuestion(<?php echo $feed['data'][$i]['id'] ?>)'>Remove</button>
                                                    <button class='btn btn-success waves-effect' 
                                                    id="<?php echo 'addQuestion'.$feed['data'][$i]['id'] ?>" 
                                                    onclick='addQuestion(<?php echo $feed['data'][$i]['id'] ?>)'>
                                                    Add to my paper
                                                </button>
                                                <?php }
                                                ?>
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

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/filtering/row-based/TableTools.ShowSelectedOnly.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>


<!-- Custom Js -->
<script src="js/admin.js"></script>

<script src="js/notifications.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>


<script src="js/question-paper-creator.js" type="text/javascript" charset="utf-8" async defer></script>



</body>

</html>