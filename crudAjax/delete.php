<?php 
include 'db.php';

$sql = "Delete from `users` where id='$_POST[id]'";
if($db->query($sql)){
    echo "Data Deleted";
} else {
    echo "Data Not Deleted";
}


?>