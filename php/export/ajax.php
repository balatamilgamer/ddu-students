<?php
$db = new mysqli('localhost', 'root', '', 'dummy_db');

$id = $_POST['id'];

$sql = "SELECT * FROM `posts` WHERE id = $id";
$result = $db->query($sql);
$row = $result->fetch_assoc();

$data = json_encode($row);

echo $data;
?>