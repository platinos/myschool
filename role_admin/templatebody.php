<!-- removing p tags by using strip_tags to ensure no new line is created by default-->
<?php 
$i=0;
$questionsFeed=$feed['data'];
foreach ($questionsFeed as $key => $value) {
	?>
	<div id="question">
		<p><strong id="ques_no">Q.<?php echo $i+1?>&nbsp;&nbsp;&nbsp;</strong><span id="ques_txt"><?php echo strip_tags($key['ques_txt']) ?> </span></p>
		<p style="text-align: center;">&nbsp;<img src="<?php echo strip_tags($key['img_src']) ?>" id="img_src" /></p>
		<table style="height: 68px; margin-left: auto; margin-right: auto;" border="0px" width="100%">
			<tbody>
				<tr style="height: 26px;">
					<td style="width: 244px; height: 26px;" id="option1">(A)<?php echo strip_tags($key['option1']) ?></td>
					<td style="width: 244px; height: 26px;" id="option2">(B)<?php echo strip_tags($key['option2']) ?></td>
				</tr>
				<tr style="height: 26px;">
					<td style="width: 244px; height: 26px;" id="option3">(C)<?php strip_tags($key['option3']) ?></td>
					<td style="width: 244px; height: 26px;" id="option4">(D)<?php strip_tags($key['option4']) ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>&nbsp;</p>
<?php
	$i++;
	} 
?>

