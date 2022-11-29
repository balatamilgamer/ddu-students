<?php
$head = "Welcome to PHP";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['title']; ?></title>
</head>
<body>
    
    <h1><?php echo $head; ?></h1>

    <table border=1>
        <tr>
            <td>Count</td>
        </tr>
        <?php
            for($i = 0; $i < 10; $i++){
        ?>
        <tr><td><?php echo $i; ?></td></tr>
        <?php
            }
        ?>
    </table>

</body>
</html>