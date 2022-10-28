
<table>
    <tr>
        <td>Pro id</td>
        <td>Cat name</td>
        <td>Pro name</td>
        <td>Pro Price</td>
    </tr>



<?php 

include '../crud/db.php';

$sql = "SELECT product.id, category.cat_name, product.name, product.price FROM product INNER JOIN category ON product.cid = category.id";

$result = $db->query($sql);

while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>$row[id]</td>";
    echo "<td>$row[cat_name]</td>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[price]</td>";
    echo "</tr>";
}




// $sql = "select * from product";
// $result = $db->query($sql);
// while($row = $result->fetch_assoc()){
//     $sel_cat = "select * from category where id = '$row[cid]'";
//     $cat_result = $db->query($sel_cat);
//     $cat_row = $cat_result->fetch_assoc();
//     echo "<tr>";
//     echo "<td>$row[id]</td>";
//     echo "<td>$cat_row[cat_name]</td>";
//     echo "<td>$row[name]</td>";
//     echo "<td>$row[price]</td>";
//     echo "</tr>";
// }

?>

</table>