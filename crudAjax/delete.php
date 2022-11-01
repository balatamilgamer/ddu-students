<?php 
include 'db.php';

$sql = "Delete from `users` where id='$_POST[id]'";
if($db->query($sql)){
    echo 1;
} else {
    echo 0;
}


?>