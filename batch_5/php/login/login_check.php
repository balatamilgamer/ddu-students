<?php 

ob_start();
session_start();

if(!isset($_SESSION['id']) || $_SESSION['id'] == ''){
    header('location: login.php');
}

include '../mysql/db.php';

$sql = "SELECT * FROM users WHERE id = ".$_SESSION['id'];
$result = $db->query($sql);
$userData = $result->fetch_assoc();

//print_r($_SESSION);

?>