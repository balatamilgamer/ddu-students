<?php

session_start();
//print_r($_SESSION);

$uid = $_SESSION['user']['id'];

// Include the database configuration file
include '../functions/db.php';

// Get the posted data

// print_r($_POST);
// print_r($_FILES);

extract($_POST);

// Get the posted data
$uploadDir = '../images/post/';
$fileName = $uid.time().basename($_FILES["img"]["name"]);
$targetFilePath = $uploadDir . $fileName;

// Allow certain file formats
$sql = "insert into post (uid,title,des,src,status,post_date) values ('$uid','$title','$des','$fileName','1',now())";

//file move
if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
    // Insert image file name into database
    $insert = $db->query($sql);
    if($insert){

        $insert_id = $db->insert_id;

        $error_code = array("code" => "1", 
        "msg" => "successfully uploaded.", 
        "id" => $insert_id);
    }else{
        $error_code = array("code" => "0", "msg" => "error in db");
    }
}else{
    $error_code = array("code" => "0", "msg" => "error in file upload");
}

// Display status message
echo json_encode($error_code);
?>