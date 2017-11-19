<!-- removing p tags by using strip_tags to ensure no new line is created by default-->
<?php 

$i=0;
$questionsFeed=$feed['data'];
$sectionsFeed=array();
foreach ($questionsFeed as $key => $value) {
	if($sectionsFeed[$questionsFeed[$i]['section']]==null){
		echo 'inserting array for '.$questionsFeed[$i]['section'];
		$sectionsFeed[$questionsFeed[$i]['section']]=array();
	}
	array_push($sectionsFeed[$questionsFeed[$i]['section']],$questionsFeed[$i]);
	$i++;
}

$i=0;
foreach($sectionsFeed as $key=> $value) {
	echo "\nquestion count in section: ".count($sectionsFeed[$key]);
	?>
	<section>
		<p>Section: <?php ?></p><br>
		<?php printSection($sectionsFeed[$key]); ?>
	</section>

<?php
$i++;
} 
?>

<?php 
function printSection($sectionFeed){
	$i=0;
	foreach($sectionFeed as $key=> $value) {
		?>
		<div id="question">
			<strong id="ques_no">Q.<?php echo $i+1?>&nbsp;&nbsp;&nbsp;</strong><span id="ques_txt"><?php echo strip_tags($sectionFeed[$key]['ques_txt']) ?> </span>
			<p align="center"> <img src="<?php echo strip_tags($sectionFeed[$key]['img_src']) ?>" id="img_src" align="middle"/></p>
			<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
				<tbody>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;" id="option1">(A)<?php echo strip_tags($sectionFeed[$key]['option1']) ?></td>
						<td style="width: 50%; 244px; height: 26px;" id="option2">(B)<?php echo strip_tags($sectionFeed[$key]['option2']) ?></td>
					</tr>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;" id="option3">(C)<?php strip_tags($sectionFeed[$key]['option3']) ?></td>
						<td style="width: 50%; height: 26px;" id="option4">(D)<?php strip_tags($sectionFeed[$key]['option4']) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<p>&nbsp;</p>
		<?php
		$i++;
	} 
}
?>
