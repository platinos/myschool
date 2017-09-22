<?php
include 'dbconnect.php';
$sql = "SELECT * FROM questions";
echo 'ddd';
    $result = mysqli_query($conn, $sql);
    //$rows = array();
   while($r = mysql_fetch_assoc($result)) {
     echo $r;
   }