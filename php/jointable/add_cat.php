<form action="" method="post">
    <input type="text" name="cat_name" />
    <input type="submit" name="submit" value="Add Category" />
</form>

<?php 
include '../crud/db.php';

if(isset($_POST['submit'])){
    $cat_name = $_POST['cat_name'];
    $sql = "INSERT INTO category (cat_name) VALUES ('$cat_name')";

    if($db->query($sql) === TRUE){
        echo "Category Added";
    }else{
        echo "Error";
    }
}
?>