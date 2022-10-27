<?php 

include 'db.php';

$id = $_GET['id'];

$select = "select * from student where id=$id";
$result = $db->query($select);
$row = $result->fetch_assoc();

print_r($row);

?>

<form action="" method="post">
    <input type="text" value="<?php echo $row['name']; ?>" name="fullname" placeholder="Name">
    <input type="text" value="<?php echo $row['email']; ?>" name="emailid" placeholder="Email">
    <input type="text" value="<?php echo base64_decode($row['password']); ?>" name="passcode" placeholder="password">
    <input type="submit" name="submit" value="Submit">
</form>

<?php 

if(isset($_POST['submit'])){

    print_r($_POST);
    extract($_POST);

    $en_ps = base64_encode($passcode);

    $sql = "update student set name='$fullname', email='$emailid', password='$en_ps' 
    where id=$id";

    if($db->query($sql)){
        header('location:list.php?msg=Record updated successfully');
    } else{
        header('location:list.php?msg=ERROR: Could not able to execute $sql. ' . $db->error);
    }

}

?>
