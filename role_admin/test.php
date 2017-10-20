<?php
include 'config.php';

$feed = apicall();
echo"<hr>";

$feed = apicall("viewquestion");
echo"<hr>";
$var =['something'=> 'h'];
$feed = apicall("viewquestion" ,$var);
echo"<hr>";


var_dump($feed);
?>