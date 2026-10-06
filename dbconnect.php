<?php

$db = 'dbGroup07';
$user = 'root';
$pass = '';
$hostname = 'localhost';
$conn = mysqli_connect($hostname,$user,$pass,$db) or die("<mark>Connection Error</mark>");


// Create database connection 
$db = new mysqli($hostname, $user, $pass, $db); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
?>