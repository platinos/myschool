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
	if($answerkey[$question['section']]==null)
		$answerkey[$question['section']]=array();
	$i++;
} 
?>

<?php 
function printSection($sectionFeed){
	$index=0;
	foreach($sectionFeed as $quesid=> $question) {
		?>
		<div id="question">
			<div><strong id="ques_no">Q.<?php echo $index+1?>&nbsp;&nbsp;&nbsp;</strong><span id="ques_txt"><?php echo strip_tags($question['ques_txt']) ?> </span><span id="marks"><?php echo "(Marks: ".strip_tags($question['marks']).")"?></span></div>
			<div align="center"> <img width=50% src="<?php echo strip_tags($question['ques_img']) ?>" id="img_src" align="middle"/></div>


			<?php
			$options=array(
				'A'=>$question['options']['option1'],
				'B'=>$question['options']['option2'],
				'C'=>$question['options']['option3'],
				'D'=>$question['options']['option4']);

			$shuffled_options = array();

			$keys = array_keys($options);
			shuffle($keys);


			$i='A';
			foreach ($keys as $key)
			{
				$shuffled_options[$i++] = $options[$key];
			}

			$answer=array_search($options['A'], $shuffled_options);
			var_dump($answer+" this is answer");
			array_push($answerkey[$question['section']],answer);

			?>

			<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
				<tbody>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;">(A)<?php echo strip_tags($shuffled_options['A']) ?></td>
						<td style="width: 50%; 244px; height: 26px;">(B)<?php echo strip_tags($shuffled_options['B']) ?>
						</td>
					</tr>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;">(C)<?php echo strip_tags($shuffled_options['C']) ?></td>
						<td style="width: 50%; height: 26px;">(D)<?php echo strip_tags($shuffled_options['D']) ?></td>
					</tr>
				</tbody>
			</table>

		</div>
		<p>&nbsp;</p>
		<?php
		$index++;
	} 
}
?>