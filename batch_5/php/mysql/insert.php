<?php 

include 'db.php';

// Insert a new record

$password = md5('bala');

$sql = "INSERT INTO `users` (`name`,`email`,`password`,`phone`,`dob`) VALUES ('PBK','pbk@gmail.com','$password','7894561230',now())";

if($db->query($sql)){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

?>