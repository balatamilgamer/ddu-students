<?php 
include 'db.php';

//print_r($_POST);

if(isset($_POST['name'])){

    if($_POST['name']==""){
        $msg = "Name is required";
        exit;
    }

    extract($_POST);

    $sql = "INSERT INTO `users`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";
    if($db->query($sql)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Data inseted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Data Not Inserted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}



?>