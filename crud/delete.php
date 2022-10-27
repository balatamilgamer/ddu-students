<?php 

include 'db.php';

$id = $_GET['id'];

$sql = "delete from student where id=$id";
if($db->query($sql)){
    header('location:list.php?msg=Record deleted successfully');
} else{
    header('location:list.php?msg=ERROR: Could not able to execute $sql. ' . $db->error);
}
?>