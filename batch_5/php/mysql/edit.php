<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    include 'db.php';
    
    if(isset($_GET['id'])){

        $id =base64_decode($_GET['id']);
        $sql = "SELECT * FROM `users` WHERE id = $id";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
    
    ?>

    <form action="action.php" method="post">
        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
        <input type="text" name="fname" value="<?php echo $row['name']; ?>" placeholder="name"><br>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" placeholder="email"><br>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" placeholder="phone"><br>
        <input type="submit" name="update" value="Submit">
    </form>


    <?php } ?>

    
    
</body>
</html>