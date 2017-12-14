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
$i=1;
//contains every section
ksort($sectionsFeed);
$sec_letter='A';
for($i=1;$i<4;$i++) {
	echo '<p> jsdlkjfaskjfda;lsd '.$sectionsFeed[$i].'</p>';
	if(!empty($sectionsFeed[$i])){
		$section=$sectionsFeed[$i];
	?>
	<section>
		<?php $sectionName=getSectionName($i);?>
		<h3 align="center">Section: <?php echo $sec_letter.": ".$sectionName ?></h3>
		<?php array_push($answerkey ,printSection($section, $i)); ?>
	</section>

	<?php
	 $sec_letter++;
	 }
} 
?>

<?php
function getSectionName($i){
	if($i==1)
		return "(MCQ)";
	else if($i==2)
		return "(Short answers)";
	else if($i==3)
		return "(Long answers)";
}
?>

<?php 
function printSection($sectionFeed, $type){
	$currentanswerkey=array();
	//array_push($currentanswerkey,"Section: ".getSectionName($type));
	$j=0;
	foreach($sectionFeed as $quesid=> $question) {
		?>
		<div id="question">
			<table style=" margin-left: auto; margin-right: auto;" border="0px" width="100%">
				<tbody>
				<tr> 
				<td><strong style="width: 2.5%;" id="ques_no">Q.<?php echo $index+1?>&nbsp;&nbsp;&nbsp;</strong></td>
				<td style="width: 87.5%;" id="ques_txt"><?php echo$question['ques_txt'] ?></td>
				<td style="width: 10%; align:right" id="marks"><?php echo "(Marks: ".strip_tags($question['marks']).")"?></td>
				</tr>
				</tbody>
			</table>
			<!-- <div align="center"> <img width=50% src="<?php echo strip_tags($question['ques_img']) ?>" id="img_src" align="middle"/></div> -->



			<?php 
			if($type==1) { 
			?>
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
			

			?>
			
			<table style=" margin-left: auto; margin-right: auto; align:right" border="0px" width="95%">
				<tbody>
					<tr>
						<td style="width: 50%; height: 26px;">(A)<?php echo strip_tags($shuffled_options['A']) ?></td>
						<td style="width: 50%; 244px; height: 26px;">(B)<?php echo strip_tags($shuffled_options['B']) ?>
						</td>
					</tr>
					<tr>
						<td style="width: 50%; height: 26px;">(C)<?php echo strip_tags($shuffled_options['C']) ?></td>
						<td style="width: 50%; height: 26px;">(D)<?php echo strip_tags($shuffled_options['D']) ?></td>
					</tr>
				</tbody>
			</table>

		</div>
		<p>&nbsp;</p>
		<?php
		}
		?>

		<?php
				if($type!=1){
					$answer=$question['answer'];
				}
					
				array_push($currentanswerkey ,($j+1)." - <span>".$answer." &nbsp;&nbsp;&nbsp;&nbsp;<img src='https://api.qrserver.com/v1/create-qr-code/?data=".$question['qr']."' height=50px></span><br><br>");
				
				$j++;
		?>

		<?php
		$index++;
	} 
	return $currentanswerkey;
}
?>