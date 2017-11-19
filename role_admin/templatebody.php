<!-- removing p tags by using strip_tags to ensure no new line is created by default-->
<?php 

$i=0;
$questionsFeed=$feed['data'];
$sectionsFeed=array();
foreach ($questionsFeed as $key => $question) {
	if($sectionsFeed[$question['section']]==null){
		$sectionsFeed[$question['section']]=array();
	}
	array_push($sectionsFeed[$question['section']],$question);
	$i++;
}

$i=0;
//contains every section
ksort($sectionsFeed);
foreach($sectionsFeed as $key=> $section) {
	?>
	<section>
		<p align="center">Section: <?php echo $key ?></p>
		<?php printSection($section); ?>
	</section>

<?php
$i++;
} 
?>

<?php 
function printSection($sectionFeed){
	$i=0;
	foreach($sectionFeed as $key=> $question) {
		?>
		<div id="question">
			<div><strong id="ques_no">Q.<?php echo $i+1?>&nbsp;&nbsp;&nbsp;</strong><span id="ques_txt"><?php echo strip_tags($question['ques_txt']) ?> </span><span id="marks"><?php echo "(Marks: ".strip_tags($question['marks']).")"?></span></div>
			<div align="center"> <img src="<?php echo strip_tags($question['ques_img']) ?>" id="img_src" align="middle"/></div>
			<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
				<tbody>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;" id="option1">(A)<?php echo strip_tags($question['option1']) ?></td>
						<td style="width: 50%; 244px; height: 26px;" id="option2">(B)<?php echo strip_tags($question['option2']) ?></td>
					</tr>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;" id="option3">(C)<?php echo strip_tags($question['option3']) ?></td>
						<td style="width: 50%; height: 26px;" id="option4">(D)<?php echo strip_tags($question['option4']) ?></td>
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
