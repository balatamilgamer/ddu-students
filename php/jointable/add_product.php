<form action="" method="post">
    <input type="text" name="product_name" />
    <select name="cat_id" id="">
        <option value="">select cat</option>
        <?php
        include '../crud/db.php';
        $sql = "SELECT * FROM category";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='$row[id]'>$row[cat_name]</option>";
            }
        }
        ?>
    </select>
    <input type="text" name="price" />
    <input type="submit" name="submit" value="Add Product" />
</form>

<?php 
if(isset($_POST['submit'])){
    extract($_POST);
    $sql = "INSERT INTO product (name, cid, price) VALUES ('$product_name', '$cat_id', '$price')";

    if($db->query($sql) === TRUE){
        echo "Product Added";
    }else{
        echo "Error";
    }
}
?>