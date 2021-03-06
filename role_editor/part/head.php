<?php 
session_start();
if(!isset($_SESSION['userData']) && empty($_SESSION['userData'])){
header('Location: ../');    
}

?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="plugins/morrisjs/morris.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />

<script src="http://msmypaper.com/mypaper/role_admin/plugins/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>

 <style type="text/css" media="screen">
        .hide{
            display: none;
        }
    </style>



<?php include 'config.php';?>
<?php include 'utilities.php'; ?>