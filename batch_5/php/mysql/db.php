<?php 

// Connect to the database

$host = "localhost";
$user = "root";
$pass = "";
$database = "batch5";

$db = new mysqli($host, $user, $pass, $database);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>