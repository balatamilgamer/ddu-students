<?php 

session_start();

include '../functions/db.php';

if(isset($_POST['pid']) && $_POST['pid']!=0){
    $where = " AND id = ".$_POST['pid'];
} else {
    $where = "";
}

$sql = "select * from post where status = 1 $where order by id desc";
$result = $db->query($sql);

$all_rows = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($all_rows);

?>