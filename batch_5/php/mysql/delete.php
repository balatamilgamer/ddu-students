<?php 

include 'db.php';

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $sql = "DELETE FROM `users` WHERE id = $id";
    if($db->query($sql)){
        $msg = "Record deleted successfully";
    } else {
        $msg = "Error: " . $sql . "<br>" . $db->error;
    }
    header("Location: list.php?m=$msg");
}

?>