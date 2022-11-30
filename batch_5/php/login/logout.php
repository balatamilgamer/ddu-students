<?php 
session_start();
ob_start();

session_destroy();

header('location: login.php');

?>