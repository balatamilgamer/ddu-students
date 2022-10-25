<?php 

session_start();

$_SESSION['data'] = "CADD";



?>

<h1>Test <?php echo $_SESSION['data']; ?></h1>