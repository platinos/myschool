<script>
	.ques_no{
		font-size: 1em;
		width:2.5%;
		vertical-align: top;
	}

	.ques_txt{
		font-size: 1em;
		width: 87.5%;
	}

	.marks{
		font-size: 1em;
		width: 10%;
		align:right;
	}

	.option_tbl{
		width:95%;
	}

	.option{
		width: 50%;
	}
</script>

<h2 style="text-align: center;">MySchool Coaching Institute</h2>
<h3 style="text-align: center;">MySchool, Udichi Building, (Opp. Hotel Asansol INN) Police Line,</h3>
<h3 style="text-align: center;">Asansol, West Bengal. 713304.</h3>
<hr />
<table style="height: 9px;" border="0px" width="80%" align="center">
	<tbody>
		<tr style="height: 15px;">
			<td style="width: 50%; height: 15px;" id="date"><?php echo "Date: ".$_GET['date'] ?></td>
			<td style="width: 50%; text-align: right; height: 15px;" id="marks"><?php echo "F.M.: ".$_GET['fmarks'] ?> </td>
		</tr>
		<tr style="height: 15px;">
			<td style="width: 50%; height: 15px;" id="subject"><?php echo "Subject: ".$_GET['subject'] ?></td>
			<td style="width: 50%; text-align: right; height: 15px;" id="time"><?php echo "Time: ".$_GET['time']." mins"
				?></td>
			</tr>
		</tbody>
	</table>
	<hr />