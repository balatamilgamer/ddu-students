<?php 

include '../php/mysql/db.php';

$sql = "SELECT * FROM student";
$result = $db->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr id='tr".$row['id']."'>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td><a href=''>Edit</a> | <span data-id='".$row['id']."' class='delete'>Delete</span></td>";
        echo "</tr>";
    }
}

?>