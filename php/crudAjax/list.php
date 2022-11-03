<?php 

include 'db.php';

echo '<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Action</th>
</tr>';

$sql = "SELECT * FROM `users`";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){
    

    echo '<tr id="'.$row['id'].'">
        <td>'.$row['name'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['phone'].'</td>
        <td>
            <button class="btn btn-info edit" data-id="'.$row['id'].'">Edit</button>
            <button class="btn btn-warning delete" data-id="'.$row['id'].'">Delete</button>
        </td>
    </tr>';

}

?>