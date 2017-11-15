<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<?php include 'part/head.php'; ?>
	<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	s	<title>MyPaper-Controller</title>

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
						<button type="button" style='display: none;' class="btn btn-primary waves-effect" id="create_paper"> Create Paper</button>
						<h2>
							ALL QUESTIONS LIST
						</h2>


					</div>
					<div style='display: none;' id='noQues'><h2>
							No Questions selected.
						</h2></div>
					<div id="cartTable" class="body">
						<?php include 'question-cart-table.php' ?>
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

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<script src="js/question-paper-creator.js" type="text/javascript" charset="utf-8" async defer></script>

<!-- Demo js -->
<script src="js/demo.js"></script>

</body>

</html>

