<?php 
include 'db.php';

$sql = "Delete from `$_POST[table]` where id='$_POST[id]'";
if($db->query($sql)){
    echo 1;
} else {
    echo 0;
}


?>