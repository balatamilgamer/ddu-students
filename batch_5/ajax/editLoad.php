<?php

include '../php/mysql/db.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM student WHERE id = $id";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $data['status'] = true;
        $data['data'] = $row;
        
    } else{
        $data['status'] = false;
        $data['msg'] = "Data Not Found";
    }

    echo json_encode($data);
}


?>