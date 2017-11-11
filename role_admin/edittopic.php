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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT TOPIC</h2>

                </div>
                <div class="body">
                    <form id="form_validation" action="" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line" id="name_header">
                                <input type="text" class="form-control" id="topic_name" name="topic" required>
                                <label class="form-label">Name of The Topic</label>
                            </div>
                        </div>

                        <label class="form-label" >Class</label>
                        <select class="form-control show-tick" name="class" id="class">
                            <option value="9" selected>IX</option>
                            <option value="10">X</option>
                            <option value="11">XI</option>
                            <option value="12">XII</option>
                        </select>
                        <br><br>

                        <label class="form-label" >Subject</label>

                        <?php

                        $feed = apicall("gettopicbyid",array("topic_id"=>$_GET['topic_id']));
                        if($feed['error']==true)
                        {
                            ?>
                            <div class="alert alert-danger">
                                <h2><b><strong>Oh snap!</strong></b> <?php echo $feed['error_msg'];?></h2>
                            </div>
                            <?php   


                        }
                        else
                            {?>
                                <select class="form-control show-tick" name="subject" id="subject" onchange="chap_select()">
                                    <option value="select" selected>Select</option>
                                    <?php
                                    $feedSubject=apicall('viewsubject');
                                    $size = $feedSubject['data']['size']; 
                                    for($i=0; $i<$size; $i++)
                                        {?>

                                            <option value=<?php echo $feedSubject['data'][$i]['name'] ?> ><?php echo $feedSubject['data'][$i]['name'] ?></option>
                                            <?php  
                                        }

                                        ?>

                                    </select>

                                    <?php
                                }
                                ?>
                                <br><br>

                                <label class="form-label">Chapter</label>
                                <select id="chapters" name="chapters" class="form-control" >
                                    <option value="0">Loading...</option>
                                </select>
                                <br><br>



                                <button class="btn btn-primary waves-effect" name="submit" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_POST['chap']) && !empty($_POST['chap'])) {
                $ch_id = $_POST['chapters'];
                if($ch_id=="0")
                    {?>
                        <script>
                            alert("Please Select a chapter");
                        </script>


                        <?php  }
                        else
                        {
                            $values = array(
                                'ch_id' => $_POST['chapters'],
                                'topic_id' => $_GET['topic_id'],
                                'topic' => $_POST['chap']
                                );
                            $feedTopic = apicall("edittopic", $values);
                            if($feedTopic['error']==true)
                            {
                                ?>
                                <div class="alert alert-danger">
                                  <h2> <b><strong>Oh snap!</strong></b> <?php echo $feedTopic['error_msg'];?></h2>
                                  <?php   


                              }
                              else
                              {
                                ?>
                                <div class="alert alert-info">
                                 <h2><b><strong>Topic Details Sucessfully Updated</strong></b></h2>
                             </div>
                             <?php
                         }
                     }
                 }
                 ?>
                 <!-- #END# Exportable Table -->
             </div>
         </section>

         

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


<script type="text/javascript">
            function chap_select(){
                var form = new FormData();
                form.append("func", "getchapters");
                form.append("class", document.getElementById("class").value);
                form.append("subject", document.getElementById("subject").value);

                var settings = {
                    "async": false,
                    "url": "functions.php",
                    "method": "POST",

                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form
                }

                $.ajax(settings).done(function (response) {
                    var jsonData= JSON.parse(response);

                    var dataSize = jsonData.size;


                    var str="<option value=0>Select</option>";
                    for (var i = 0; i < jsonData.data.length; i++) {
                        var counter = jsonData.data[i];
                        str += "<option value='"+counter.id+"'>"+counter.chapter+"</option>";
                    }
                });
                var select = $('#chapters');
                select.empty().append(str);


            }

        //appends data
        console.log('testing');
        var name="<?php echo $feed['data'][0]['topic']; ?>";
        $('#topic_name').val(name);
        $('#name_header').addClass('focused');

        <?php $feedChapterDetails=apicall('getchapterbyid', array("ch_id"=>$feed['data'][0]['ch_id'])) ?>
        var subject="<?php echo $feedChapterDetails['data'][0]['subject'] ?>";
        var clas="<?php echo $feedChapterDetails['data'][0]['class'] ?>";
         var chap_name="<?php echo $feedChapterDetails['data'][0]['chapter'] ?>";
         //alert(chap_name);

        $('#class').val(clas).prop('selected',true);
        $('#subject').val(subject).prop('selected',true);
        chap_select();
       
        $('#chapters').val(chap_name).prop('selected',true);

        console.log(subject+" "+clas+" "+chap_name);
    </script>  


</body>

</html>

