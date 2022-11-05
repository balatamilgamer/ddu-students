<?php 

include '../functions/db.php';

print_r($_POST);

if(isset($_POST['name'])){

    extract($_POST);

    $password = md5($password);
    $create_datetime = date('Y-m-d H:i:s');
    

    $sql = "INSERT INTO users (name, email, password, created) VALUES ('$name', '$email', '$password', '$create_datetime')";

    if($db->query($sql) === TRUE){

        $instert_id = $db->insert_id;

        $profile_img = time().$_FILES['profile_img']['name'];
        $tmp_name = $_FILES['profile_img']['tmp_name'];

        if(move_uploaded_file($tmp_name, "../images/profile/$profile_img")){

            $sql = "UPDATE users SET profile_img = '$profile_img' WHERE id = $instert_id";

            $db->query($sql);

        }

        header('location: ../login.php?login=1');

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

?>