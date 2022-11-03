<form action="" method="post">
    <select name="author" id="">
        <option value="">Select Author</option>
        <?php 
        include 'db.php';

        $sql = "SELECT * FROM author";
        $result = $db->query($sql);
        print_r($result);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '<option value="'.$row['id'].'">'.ucfirst($row['name']).'</option>';
            }
        }
        ?>
    </select>
    <input type="text" name="book" placeholder="Book" />
    <input type="submit" name="submit" value="Add book" />
</form>


<?php

include 'db.php';

if (isset($_POST['submit'])) {
    $author = $_POST['author'];
    $book = $_POST['book'];
    $sql = "INSERT INTO book (name, author_id) VALUES ('$book', '$author')";
    if($db->query($sql)){
        echo 'added';
    } else {
        echo 'error';
    }
    
}

?>