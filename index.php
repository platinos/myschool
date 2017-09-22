<?php
include 'dbconnect.php';
$sql = "SELECT * FROM questions";

    $result = mysqli_query($conn, $sql);
    //$rows = array();
   while($r = mysqli_fetch_assoc($result)) {
     echo $r;
   }