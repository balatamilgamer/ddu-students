<?php include 'login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Welcome to book rent <?php echo $_SESSION['user']; ?></h1>

<?php
    if(isset($_POST['submit'])){
        extract($_POST);
        
        echo $sql = "INSERT INTO rent_book (`sid`, `bid`, `outime`) VALUES ($_SESSION[id], $books, now())";

        if($db->query($sql)){
            echo "Book Added";
        } else {
            echo "Error in adding book";
        }
    }
    ?>

    <form action="" method="post">
        <select name="books">
            <option value="">Please Select Books</option>
            <?php
            $sBooks = "SELECT * FROM books WHERE status = 1 AND qty > 0";
            $result = $db->query($sBooks);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){

                    $select_rent = "SELECT bid FROM rent_book WHERE bid = $row[id] AND intime IS NULL";
                    $rent_result = $db->query($select_rent);
                    $book_count = $row['qty'] - $rent_result->num_rows;

                    if($book_count>0){                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['bname'].' ('.$book_count.')'; ?></option>
                    <?php }
                }
            }
            ?>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

    
    
</body>
</html>