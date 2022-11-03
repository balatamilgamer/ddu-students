
<table>
    <tr>
        <td>Sno</td>
        <td>Book Name</td>
        <td>Author Name</td>
    </tr>
    <?php
        include 'db.php';
        $sql = "SELECT book.id, book.name as book, author.name FROM book INNER JOIN author ON book.author_id = author.id";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['book'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '</tr>';
            }
        }
    ?>
</table>