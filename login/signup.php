<form action="" method="post">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="text" name="password" placeholder="Password"><br>
    <input type="submit" name="submit" value="Signup">
</form>

<?php 


include 'db.php';

if (isset($_POST['submit'])) {
    
    extract($_POST);

    //find if email already exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $db->query($sql);
    //print_r($result);

    if($result->num_rows==0){

        $en_password = md5($password);

        $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `password`) 
        VALUES ('$name', '$email', '$phone', '$en_password')";


        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

    } else {
        echo "Email already exists";
    }

}

?>