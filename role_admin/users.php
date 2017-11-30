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

            $feed = json_decode(localapicall("viewusers"), true) ;
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
                                ALL USERS LIST
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Picture</th>
                                        <th>Actions</th>




                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Id</th>
                                       <th>Status</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Picture</th>
                                       <th>Actions</th>


                                   </tr>
                               </tfoot>
                               <tbody>
                                <?php


                                for($i=0; $i<count($feed['data']); $i++)
                                    {?>
                                        <tr>
                                            <td><?php echo $feed['data'][$i]['id'] ?></td>
                                            <td id='status<?php echo $feed['data'][$i]['id'] ?>'><?php echo $feed['data'][$i]['status'] ?></td>
                                            <td><?php echo $feed['data'][$i]['name'] ?></td>
                                            <td><?php echo $feed['data'][$i]['email'] ?></td>
                                            <td><img width='100' src='<?php echo $feed['data'][$i]['picture'] ?>'/></td>
                                            <td><select id='user_action<?php echo $feed['data'][$i]['id'] ?>' name="user_action" onchange="userAction(<?php echo $feed['data'][$i]['id'] ?>)">
                                                <option value="">Choose an Action</option>
                                                <option value="assignCreator">Assign as Paper Creator</option>
                                                <option value="assignEditor">Assign as Editor</option>
                                                <option value="assignAdmin">Assign as Admin</option>
                                                <option value="assignDelete">Delete User</option>
                                                option
                                            </select></td>



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
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <script>

        function userAction(id){
var ans=confirm('Do you really want to do this action?');
                    if(ans===true){
                    

            $.ajax({
                url: 'functions.php',
                type: 'POST',
                data: {id: id, funcLocal: $('#user_action'+id).val()},
                
            })
            .done(function(data){
                data=JSON.parse(data);

                $('#status'+id).html(data.status);
                showNotification("bg-green", data.msg, "bottom", "right", "animated bounceInRight", "animated bounceOutRight");   
            })
            .fail(function() {
        
        showNotification("alert-warning", 'An error occured while trying to modify User. Please try after some time.', "bottom", "right", "animated bounceInRight", "animated bounceOutRight");    
        
    })
        }
        }
    </script>

</body>

</html>

