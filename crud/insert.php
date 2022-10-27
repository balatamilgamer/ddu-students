<form action="" method="post">
    <input type="text" name="fullname" placeholder="Name">
    <input type="text" name="emailid" placeholder="Email">
    <input type="text" name="passcode" placeholder="password">
    <input type="submit" name="submit" value="Submit">
</form>

<?php 

include 'db.php';

if(isset($_POST['submit'])){

    print_r($_POST);
    extract($_POST);

    $en_ps = base64_encode($passcode);

    $sql = "insert into student (name, email, password) values 
    ('$fullname', '$emailid', '$en_ps')";

    if($db->query($sql)){
        echo "Record inserted successfully";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $db->error;
    }

}

?>