<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="username" placeholder="username/email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="submit" name="submit" value="submit">
</form>

<?php
session_start();
ob_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != ''){
    header('location: profile.php');
}


include '../mysql/db.php';

if(isset($_POST['submit'])){

    extract($_POST);

    if($username!='' && $password!=''){

        $select = "SELECT * FROM users WHERE name = '$username' OR email = '$username'";
        $result = $db->query($select);

        if($result->num_rows > 0 ){

            $data = $result->fetch_assoc();

            if($data['password'] == md5($password)){
                
                $update = "UPDATE `users` SET last_login = now() WHERE id=".$data['id'];

                if($db->query($update)){

                    $_SESSION['user'] = $data['name'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['id'] = $data['id'];

                    header('location: profile.php');

                } else {
                    echo "Error in updating last login";
                }

            } else{
                echo "password incorrect";
            }

        } else{
            echo "user not found";
        }

    }

}
?>
    
</body>
</html>