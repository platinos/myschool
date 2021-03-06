<!-- removing p tags by using strip_tags to ensure no new line is created by default-->
<?php 

//creates an array which contains an array for every section. Each section may have n questions
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
	array_push($currentanswerkey,$type);
	array_push($currentanswerkey,"Section: ".getSectionName($type));
	$j=0;
	foreach($sectionFeed as $quesid=> $question) {
		?>
		<div id="question">
			<table border="0px">
				<tbody>
				<tr> 
				<td class="ques_no"><strong >Q.<?php echo $index+1?></strong></td>
				<td class="ques_txt"><?php echo $question['ques_txt'] ?></td>
				<td class="marks"><?php echo "(Marks: ".strip_tags($question['marks']).")"?></td>
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
			
			<table border="0px" class="option_tbl">
				<tbody>
					<tr>
						<td class="option" >
							<table border="0px">
								<tr>
								<td class="option-ques-n">(A)</td>
								<td class="option-ques-val"><?php echo $shuffled_options['A'] ?></td>
								</tr>
							</table>
						</td>

						<td class="option" >
							<table border="0px">
								<tr>
								<td class="option-ques-n">(B)</td>
								<td class="option-ques-val"><?php echo $shuffled_options['B'] ?></td>
								</tr>
							</table>
						</td>
						
					</tr>
					<tr>
						<td class="option" >
							<table border="0px">
								<tr>
								<td class="option-ques-n">(C)</td>
								<td class="option-ques-val"><?php echo $shuffled_options['C'] ?></td>
								</tr>
							</table>
						</td>
						<td class="option" >
							<table border="0px">
								<tr>
								<td class="option-ques-n">(D)</td>
								<td class="option-ques-val"><?php echo $shuffled_options['D'] ?></td>
								</tr>
							</table>
						</td>
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
				

				$answertbl="<table border='0px' >
								<tbody>
									<tr>
										<td width=2.5% class='answer'>".($j+1).".</td>
										<td width=97.5% class='answer'>".$answer."</td>
									</tr>
									<tr>
										<td width=2.5%></td>
										<td width=97.5%><img src='https://api.qrserver.com/v1/create-qr-code/?data=".$question['qr']."' height=50px></td>
									</tr>
								</tbody>
							</table>";
				array_push($currentanswerkey ,$answertbl);
				
				$j++;
		?>

		<?php
		$index++;
	} 
	return $currentanswerkey;
}
?>