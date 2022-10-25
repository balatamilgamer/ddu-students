<?php 

session_start();

$_SESSION['name'] = "bala";


?>


<form action="" method="POST">
    <input type="text" name="fullname">
    <input type="submit" value="submit">
</form>