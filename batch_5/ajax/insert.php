<?php 

include '../php/mysql/db.php';


if(isset($_POST['name'])){

    extract($_POST);

    $en_pass = md5($password);

    $sql = "Insert into student (name,email,password) values ('$name','$email','$en_pass')";

    
    if($db->query($sql)){
        $insert_id = $db->insert_id;
        $result['id'] = $insert_id;
        $result['status'] = true;
        $result['msg'] = "Data Inserted";
        $result['data'] = $_POST;
        $result['password'] = $en_pass;
    } else{
        $result['status'] = false;
        $result['msg'] = "Data Not Inserted";
    }

    echo json_encode($result);

}

?>