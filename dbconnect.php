<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "myschool";

// Create connection
$conn3 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn3) {
    die("Connection failed: " . mysqli_connect_error());
}