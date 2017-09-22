<?php
include 'dbconnect.php';
$sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);
    $rows = array();
   while($r = mysql_fetch_assoc($result)) {
     $rows['object_name'][] = $r;
   }
   print_r(json_encode($rows)) ;