<?php 

$db = new mysqli('localhost', 'root', '', 'batch4');

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

?>