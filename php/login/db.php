<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$db = "ddu";

$db = new mysqli($host, $user, $pass, $db);

// if ($db->connect_errno) {
//     echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
// } else {
//     echo "Connected to MySQL";
// }

?>