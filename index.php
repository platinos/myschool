<?php
include 'dbconnect.php';
$sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);
    $rows = array();
   while($r = mysql_fetch_assoc($result)) {
     echo $r;
   }