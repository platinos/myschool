<html>

<head>
	
	<?php 
	

	include 'part/head.php'; 

	?>
	<title>MyPaper-Controller</title>

	

</head>
<?php include 'part/body.php'; ?>
<?php include 'part/nav.php'; ?>

<div class="row">

	<?php

	$feed = apicall('countdata');
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

			



			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h1>
							Hi <?php  echo $_SESSION['userData']['first_name'] ?>! Welcome to MyPaper Control Room
							
						</h1>

					</div>
					<div class="body">
						<p>
							Drool pounce on unsuspecting person fall asleep on the washing machine, yet playing with balls of wool but suddenly go on wild-eyed crazy rampage yet vommit food and eat it again and has closed eyes but still sees you. Push your water glass on the floor. Spread kitty litter all over house shove bum in owner's face like camera lens. Find a way to fit in tiny box eat half my food and ask for more so sit in box hiding behind the couch until lured out by a feathery toy. Proudly present butt to human loved it, hated it, loved it, hated it
						</p>

					</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
						<h2>
							MyPaper Stats
							
						</h2>

					</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="info-box-3 bg-pink hover-zoom-effect" >
						<div class="icon" >
							<a href="viewquestion.php">  <i class="material-icons" >QUESTIONS</i></a>
						</div>
						<div class="content">
							<div class="text">TOTAL QUESTION</div>
							<div class="number"><?php echo $feed['data']['questions_count'] ?></div>
						</div>
					</div>

				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="info-box-3 bg-blue hover-zoom-effect">
						<div class="icon">
							<a href="viewchapter.php">      <i class="material-icons">CHAPTERS</i></a>
						</div>
						<div class="content">
							<div class="text">CHAPTERS</div>
							<div class="number"><?php echo $feed['data']['chapters_count'] ?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="info-box-3 bg-light-green hover-zoom-effect">
						<div class="icon">
							<a href="viewsubject.php"><i class="material-icons">SUBJECTS</i></a>
						</div>
						<div class="content">
							<div class="text">SUBJECTS</div>
							<div class="number"><?php echo $feed['data']['subjects_count'] ?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="info-box-3 bg-cyan hover-zoom-effect">
						<div class="icon">
							<a href="viewtopic.php"> <i class="material-icons">TOPIC</i></a>
						</div>
						<div class="content">
							<div class="text">TOPICS</div>
							<div class="number"><?php echo $feed['data']['topics_count'] ?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="info-box-3 bg-grey hover-zoom-effect">
						<div class="icon">
							<i class="material-icons">GENERATED</i>
						</div>
						<div class="content">
							<div class="text">GENERATED QUESTION PAPERS</div>
							<div class="number"><?php echo $feed['data']['questionpaper_count'] ?></div>
						</div>
					</div>

				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="info-box-3 bg-red hover-zoom-effect">
						<div class="icon">
							<i class="material-icons">USERS</i>
						</div>
						<div class="content">
							<div class="text">USERS</div>
							<div class="number"><?php echo $feed['data']['users_count'] ?></div>
						</div>
					</div>
				</div>
							</div>


		</div>

	</section>

	<?php }?>
<!-- 
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<div class="card">
					<div class="header">
						<h2>
							SHORTCUT CONTROLS
							<small>links on fingertip</small>
						</h2>

					</div>
					<div class="body">
						<div class="icon-button-demo">

							<a href="#"> <button type="button" class="btn btn-success waves-effect" >
								<i class="material-icons" style="font-size: 90px">settings_applications</i>
								create question paper
							</button></a>

							<a href="viewquestion.php"> <button type="button" class="btn btn-info waves-effect" >
								<i class="material-icons" style="font-size: 90px">question_answer</i>

							</button></a>

							<a href="#"> <button type="button" class="btn btn-primary waves-effect" >
								<i class="material-icons" style="font-size: 90px">note_add</i>
								add new question
							</button></a>

							<a href="viewsubject.php"> <button type="button" class="btn btn-warning waves-effect" >
								<i class="material-icons" style="font-size: 90px">subject</i>
								add new subject
							</button></a>


							<a href="viewchapter.php"> <button type="button" class="btn btn-danger waves-effect" >
								<i class="material-icons" style="font-size: 90px">control_point</i>
								add new chapter
							</button></a>

							<a href="viewtopic.php"> <button type="button" class="btn bg-pink waves-effect" >
								<i class="material-icons" style="font-size: 90px">control_point_duplicate</i>
								add new topic
							</button></a>

							<a href="#"> <button type="button" class="btn bg-purple waves-effect" >
								<i class="material-icons" style="font-size: 90px">brightness_1</i>

							</button></a>
							<a href="#"> <button type="button" class="btn bg-indigo waves-effect" >
								<i class="material-icons" style="font-size: 90px">blur_on</i>

							</button></a>

							<a href="#"> <button type="button" class="btn bg-lime waves-effect" >
								<i class="material-icons"  style="font-size: 90px">print</i>


							</button></a>
						</button></a>

						<a href="#"> <button type="button" class="btn bg-grey waves-effect" >
							<i class="material-icons"  style="font-size: 90px">face </i>
							add new user

						</button></a>

					</div>
				</div>
			</section>
 -->
		</div>


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

<?php var_dump($_SESSION['userData']); ?>

</body>

</html>


