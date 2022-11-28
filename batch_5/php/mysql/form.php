<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="action.php" method="post">
        <input type="text" name="fname" placeholder="name"><br>
        <input type="text" name="email"  placeholder="email"><br>
        <input type="text" name="phone"  placeholder="phone"><br>
        <input type="text" name="password"  placeholder="password"><br>
        <input type="submit" name="submit" value="Submit">
    </form>


    <?php 
    
    if(isset($_GET['m'])){
        echo $_GET['m'];
    }

    ?>

    
    
</body>
</html>