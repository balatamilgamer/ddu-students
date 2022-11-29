<?php

    include 'db.php';
    
    if(isset($_POST['submit'])){
       
        extract($_POST);

        //print_r($_POST);

        $en_password = md5($password);
        $dob = date("Y-m-d");

        $sql = "INSERT INTO `users` (`name`,`email`,`phone`,`password`,`dob`) VALUES ('$fname','$email','$phone','$en_password','$dob')";

        if($db->query($sql)){

            $insert_id = $db->insert_id;

            $msg = "New record created successfully, Your ID: $insert_id";

        } else {
            $msg = "Error: " . $sql . "<br>" . $db->error;
        }

        
        header("Location: form.php?m=$msg");

    }

    if(isset($_POST['update'])){
       
        extract($_POST);

        $id = base64_decode($id);

        $sql = "UPDATE `users` SET `name`='$fname',`email`='$email',`phone`='$phone' WHERE id = $id";

        if($db->query($sql)){

            $msg = "New record updated successfully";

        } else {
            $msg = "Error: " . $sql . "<br>" . $db->error;
        }

        
        header("Location: list.php?m=$msg");

    }

    ?>