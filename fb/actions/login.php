<?php 

session_start();
ob_start();

include '../functions/db.php';

print_r($_POST);

if(isset($_POST)){
    
        extract($_POST);
    
        $password = md5($password);
    
        $sql = "SELECT * FROM users WHERE email = '$email'";
    
        $result = $db->query($sql);
    
        if($result->num_rows > 0){
    
            $user = $result->fetch_assoc();

            if($password == $user['password']){

                $_SESSION['user'] = $user;

                $user_id = $user['id'];

                $update = "UPDATE users SET last_login = NOW() WHERE id = $user_id";

                $db->query($update);
        
                header('location: ../index.php');

            } else{
                header('location: ../login.php?login=3');
            }            
    
        } else {
            header('location: ../login.php?login=0');
        }
    
}

?>