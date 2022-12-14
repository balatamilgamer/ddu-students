
<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
    </tr>
<?php 

include 'pagination.php';

if(isset($_GET['search']) && $_GET['search'] != ''){
    $search = $_GET['search'];
} else{
    $search = '';
}


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$limit = 2;
$url = "index.php";

$coloums = array("id","name","email","phone");
$pg = new pagination("users", $coloums, "$search", $limit, $page, $url);

print_r($pg->getTotal());

foreach($pg->getData() as $row){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "</tr>";
}

?>

</table>

<?php 
echo $pg->pageNav();
?>


<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
    </tr>
<?php 


$col = array("id","name","email","password");
$pg2 = new pagination("student", $col, "$search", $limit, $page, $url);

print_r($pg2->getTotal());

foreach($pg2->getData() as $row){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "</tr>";
}

?>

</table>