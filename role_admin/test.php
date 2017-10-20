<?php
include 'config.php';

$feed = apicall();
var_dump($feed);
echo"<hr>";

$feed = apicall("viewquestion");
var_dump($feed);
echo"<hr>";
$var =['something'=> 'h'];
$feed = apicall("addsubject" ,$var);
var_dump($feed);
echo"<hr>";



?>