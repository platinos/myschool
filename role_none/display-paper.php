<?php session_start();
?>
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
								ALL QUESTIONS LIST
							</h2>


<?php
                            if(displayPaperButton()){

                                ?>
							<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#mdModal" id="create_paper"> Finalize Paper</button>
							</li>
						</ul>

                             <?php }?>

						

						<!-- qpname, qpclass, qpsubject qptime qlist qparraywhichitrig-->
						<div class="modal fade in" id="mdModal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content modal-col-teal">
									<div class="modal-header">
										<h4 class="modal-title" id="defaultModalLabel">Enter question paper details: </h4>
									</div>
									<div class="modal-body">


										<form id='paperdetails' action="functions.php" method="post" accept-charset="utf-8">
											<div class="form-group">
												<div class="form-line">
													<input type="text" name='qpname' class="form-control" placeholder="Paper Name">
												</div>
											</div>

											<div class="form-group">
												<div class="form-line">
													<input type="text" name='qpclass' class="form-control" placeholder="Class">
												</div>
											</div>

											<div class="form-group">
												<div class="form-line">
													<input type="text" name='qpsubject' class="form-control" placeholder="Subject">
												</div>
											</div>

											<div class="form-group">
												<div class="form-line">
													<input type="number" name='qptime' class="form-control" placeholder="Interval in minutes">
												</div>
											</div>

											<input type="hidden" name="func" value="sendcartdata">
											<input type="hidden" name="qlist" id='qlist' >

										</form>


										


									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-link waves-effect" onclick="sessiontostring();">SAVE PAPER</button>
										<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
									</div>
								</div>
							</div>
						</div>



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
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>


<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<script src="js/question-paper-creator.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="js/notifications.js"></script>

<!-- Demo js -->
<script src="js/demo.js"></script>

</body>

</html>

