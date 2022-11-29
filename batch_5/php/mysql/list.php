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
    
    if(isset($_GET['m'])){
        echo $_GET['m'];
    }

    ?>

    <form action="" method="get">
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>

    <table border=1>
        <tr>
            <td>Sno</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>

        <?php

            include 'db.php';

            if(isset($_GET['search'])){
                $keyword = $_GET['search'];
                $search = " WHERE name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR phone LIKE '%$keyword%'";
            }else{
                $search = '';
            }

            $sql = "SELECT * FROM `users`".$search;
            $result = $db->query($sql);

            print_r($result);

            $total = $result->num_rows;

            

            if($total > 0){

                while($row = $result->fetch_assoc()){
                    
                    $en_id = base64_encode($row['id']);

                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td><a href='edit.php?id=".$en_id."'>Edit</a> | <a href='delete.php?id=".$en_id."'>Delete</a></td>";
                    echo "</tr>";
                }

            } else{
                echo "No records found";
            }
        
        ?>

    </table>
    
</body>
</html>