<?php session_start();

include 'config.php';

header("Access-Control-Allow-Origin: *");

$json = file_get_contents('php://input');
$obj = json_decode($json);
echo json_encode($obj);
?>