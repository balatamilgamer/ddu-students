<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


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

            if(isset($_GET['search']) && $_GET['search'] != ''){
                $keyword = $_GET['search'];
                $search = " WHERE name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR phone LIKE '%$keyword%'";
                $pkeyword = "&search=".$keyword;
            }else{
                $search = '';
                $pkeyword = '';
            }

            $sql = "SELECT * FROM `users`".$search;
            $result = $db->query($sql);

            print_r($result);

            $items = 2;
            $total = $result->num_rows;
            $pages = ceil($total/$items);

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $offset = ($page-1)*$items;
            
            $sql.= " LIMIT $offset, $items";
            $data = $db->query($sql);            

            if($total > 0){

                while($row = $data->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
                    echo "</tr>";
                }

            } else{
                echo "No records found";
            }
        
        ?>

    </table>

    <?php

        if($page!=1){
            echo "<a href='page.php?page=".($page-1).$pkeyword."'>Prev</a> ";
        }

        for($i=1; $i<=$pages; $i++){
            echo "<a href='page.php?page=$i$pkeyword'>$i</a> ";
        }

        if($page!= $pages){
            echo " <a href='page.php?page=".($page+1).$pkeyword."'>Next</a>";
        }
    ?>
    
</body>
</html>