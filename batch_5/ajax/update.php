<?php 

include '../php/mysql/db.php';

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $sql = "UPDATE student SET name = '$_POST[name]', email = '$_POST[email]', password = '$_POST[password]' WHERE id = $id";

    if($db->query($sql)){
        $result['status'] = true;
        $result['msg'] = "Data Updated";
    } else{
        $result['status'] = false;
        $result['msg'] = "Data Not Updated";
    }

    echo json_encode($result);

}


?>