<!-- removing p tags by using strip_tags to ensure no new line is created by default-->
//inside template body
<?php 

$i=0;
$questionsFeed=$feed['data'];
$sectionFeed=array();
foreach ($questionsFeed as $key => $value) {
	if($sectionFeed[$questionsFeed[$i]['section']]==null){
		$sectionFeed[$questionsFeed[$i]['section']]=array();
	}
	//echo "\nsectionFeed section:".$questionsFeed[$i]['section']." question: ".$questionsFeed[$i]['ques_txt'];
	array_push($sectionFeed[$questionsFeed[$i]['section']],$questionsFeed[$i]);
	//echo "\nin array ".$sectionFeed[$questionsFeed[$i]['section']][0]['ques_txt'];
	$i++;
}

$i=0;
echo "\n no of sections: ".count($sectionFeed);
foreach($sectionFeed as $key=> $value) {
	echo "\nquestion count in section: ".count($sectionFeed);
	//	ksort($sectionFeed);
	?>
	<section>
		<p>Section: <?php echo 'we are in section '.$sectionFeed[$i][0]['section']?></p><br>
		<?php printSection($sectionFeed); ?>
	</section>

<?php
$i++;
} 
?>

<?php 
function printSection($sectionFeed){
	$i=0;
	echo "inside printsection";
	foreach($sectionFeed as $key=> $value) {
		?>
		<div id="question">
			<strong id="ques_no">Q.<?php echo $i+1?>&nbsp;&nbsp;&nbsp;</strong><span id="ques_txt"><?php echo strip_tags($sectionFeed[$i]['ques_txt']) ?> </span>
			<p align="center"> <img src="<?php echo strip_tags($sectionFeed[$i]['img_src']) ?>" id="img_src" align="middle"/></p>
			<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
				<tbody>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;" id="option1">(A)<?php echo strip_tags($sectionFeed[$i]['option1']) ?></td>
						<td style="width: 50%; 244px; height: 26px;" id="option2">(B)<?php echo strip_tags($sectionFeed[$i]['option2']) ?></td>
					</tr>
					<tr style="height: 26px;">
						<td style="width: 50%; height: 26px;" id="option3">(C)<?php strip_tags($sectionFeed[$i]['option3']) ?></td>
						<td style="width: 50%; height: 26px;" id="option4">(D)<?php strip_tags($sectionFeed[$i]['option4']) ?></td>
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
