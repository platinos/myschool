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

$i='A';
//contains every section
ksort($sectionsFeed);
foreach($sectionsFeed as $key=> $section) {

	?>
	<section>
		<?php $sectionName=getSectionName($i);?>
		<h3 align="center">Section: <?php echo $i." ".$sectionName ?></h3>
		<?php $answerkey =$answerkey."Section: ".$key."<br>";?>
		<?php $answerkey = printSection($section); ?>
	</section>

	<?php

	$i++;
} 
?>

<?php
function getSectionName($i){
	if($i=='A')
		return "(MCQ)";
	else if($i=='B')
		return "(Short answers)";
	else if($i=='C')
		return "(Long answers)";
}
?>

<?php 
function printSection($sectionFeed){
	$index=0;
	$answerkey2 = "";
	foreach($sectionFeed as $quesid=> $question) {
		?>
		<div id="question">
			<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
				<tbody>
				<tr>
				<td><strong style="width: 5%;" id="ques_no">Q.<?php echo $index+1?>&nbsp;&nbsp;&nbsp;</strong></td>
				<td style="width: 85%;" id="ques_txt"><?php echo$question['ques_txt'] ?></td>
				<td style="width: 10%; align:right" id="marks"><?php echo "(Marks: ".strip_tags($question['marks']).")"?></td>
				</tr>
				</tbody>
			</table>
			<!-- <div align="center"> <img width=50% src="<?php echo strip_tags($question['ques_img']) ?>" id="img_src" align="middle"/></div> -->


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
			//var_dump($answer);
			$answerkey2 = $answerkey2.($index+1)." - ".$answer." &nbsp;&nbsp;&nbsp;&nbsp;<img src='https://api.qrserver.com/v1/create-qr-code/?data=".$question['qr']."' height=50px><br><br>";
		

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
	return $answerkey2;
}
?>