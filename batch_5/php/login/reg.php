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
        <input type="text" name="username" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
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

        if($username!='' && $email!='' && $password!=''){

            $select = "SELECT * FROM users WHERE name = '$username' OR email = '$email'";
            $result = $db->query($select);

            print_r($result);

            //print_r($_POST);

            if($result->num_rows > 0){
                echo "user already exists";
            } else {

                $en_pass = md5($password);

                $sql = "INSERT INTO `users` (`name`, `email`, `password`,`created_on`) VALUES ('$username', '$email', '$en_pass', now())";

                if($db->query($sql)){
                    echo "Data inserted successfully";
                }else{
                    echo "Data not inserted";
                }
            }

        }else{
            echo "please fill all the fields";
        }

    }
    ?>
    
</body>
</html>