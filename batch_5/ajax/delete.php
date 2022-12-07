<?php 

include '../php/mysql/db.php';

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $sql = "DELETE FROM student WHERE id = $id";

    if($db->query($sql)){
        $result['status'] = true;
        $result['msg'] = "Data Deleted";
    } else{
        $result['status'] = false;
        $result['msg'] = "Data Not Deleted";
    }

    echo json_encode($result);

}

?>