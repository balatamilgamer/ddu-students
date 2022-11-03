<form action="" method="post">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
    <input type="submit" name="login" value="Login">
</form>

<?php
//login check

include 'db.php';

if(isset($_POST['login'])){
    extract($_POST);

    $en_password = md5($password);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$en_password'";
    $result = $db->query($sql);

    if($result->num_rows==1){
        
        header("Location: profile.php");

    } else {
        echo "Login Failed";
    }

}

?>
