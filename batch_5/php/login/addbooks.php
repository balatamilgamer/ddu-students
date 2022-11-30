<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="bname" placeholder="Book Name">
        <input type="number" name="qty" placeholder="QTY">
        <select name="books">
            <option value="">Please Select Books</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php 
    
    include '../mysql/db.php';

    if(isset($_POST['submit'])){
        extract($_POST);

        $insert = "INSERT INTO books (bname, qty, status) VALUES ('$bname', '$qty', '$books')";

        if($db->query($insert)){
            echo "Book Added";
        } else {
            echo "Error in adding book";
        }
    }

    ?>

    <table>
        <tr>
            <td>Name</td>
            <td>QTY</td>
            <td>Stauts</td>
        </tr>
        <?php
        $select = "SELECT * FROM books";
        $result = $db->query($select);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['bname']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    
</body>
</html>