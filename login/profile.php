


<table border=1>
    <tr>
        <td>Sno</td>
        <td>Name</td>
        <td>email</td>
        <td>Phone</td>
    </tr>
<?php 
include 'db.php';

$sql = "SELECT id,name,email,phone FROM users";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['phone']."</td>
        </tr>";
}

?>
</table>