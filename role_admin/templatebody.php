<?php 
$i=0;
$questionsFeed=$feed['data'];
foreach ($questionsFeed as $key => $value) {
	?>
	<div id="question">
		<p><strong id="ques_no"><?php echo "Q.".($i+1)."&nbsp;&nbsp;&nbsp;&nbsp;"?></strong><span id="ques_txt"><?php echo $questionsFeed[$i]['ques_txt'] ?> </span></p>
		<p style="text-align: center;">&nbsp;<img src="<?php echo $questionsFeed[$i]['img_src'] ?>" id="img_src" /></p>
		<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
			<tbody>
				<tr style="height: 26px;">
					<td style="width: 244px; height: 26px;" id="option1"><?php echo "(A.)".$questionsFeed[$i]['option1'] ?></td>
					<td style="width: 244px; height: 26px;" id="option2"><?php echo "(B.)".$questionsFeed[$i]['option2'] ?></td>
				</tr>
				<tr style="height: 26px;">
					<td style="width: 244px; height: 26px;" id="option3"><?php echo "(C.)".$questionsFeed[$i]['option3'] ?></td>
					<td style="width: 244px; height: 26px;" id="option4"><?php echo "(D.)".$questionsFeed[$i]['option4'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>&nbsp;</p>
<?php
	$i++;
	} 
?>

