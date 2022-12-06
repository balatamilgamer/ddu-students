<?php 

include 'login_check.php';

if(isset($_GET['id']) && $_GET['id']!=""){

    $sql = "UPDATE rent_book SET intime = NOW() WHERE id = ".$_GET['id'];

    if($db->query($sql)){
        $msg = "Book Returned";
    }else{
        $msg = "Error";
    }

    header("Location: rent_list.php?msg=".$msg);

}
?>