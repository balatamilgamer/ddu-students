<?php 
include 'db.php';

print_r($_POST);

if(isset($_POST['name'])){
    extract($_POST);

    $sql = "update `users` set `name`='$name',`email`='$email',`phone`='$phone' where id='$id'";
    if($db->query($sql)){
        echo "Data updated";
    } else {
        echo "Data Not updated";
    }
}


?>