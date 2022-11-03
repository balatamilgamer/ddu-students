<form action="" method="post">
    <input type="text" name="author" />
    <input type="submit" name="submit" value="Add Author" />
</form>

<?php 
include 'db.php';

if (isset($_POST['submit'])) {
    $author = $_POST['author'];
    $sql = "INSERT INTO author (name) VALUES ('$author')";
    if($db->query($sql)){
        echo 'added';
    } else {
        echo 'error';
    }
    
}

?>