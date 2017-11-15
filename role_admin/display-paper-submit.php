<?php
	session_start();
	$qc=$_SESSION['questionCart'];
	$qidString='';
	foreach($qc as $qid => $val){
		$qidString.= $qid.',';
	}
	$q=rtrim($qidString,',');
	$response['str'] = $q;
	echo json_encode($response);
?>