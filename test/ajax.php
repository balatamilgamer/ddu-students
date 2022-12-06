<?php

ob_start();
session_start();

$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "e3";

//connection to the database
$db = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


if(isset($_POST['action']) && $_POST['action'] == 'load_qus'){

    $_SESSION['qus'] = "";

    $sql = "SELECT `id` FROM `qus` WHERE `status` = 1 ORDER BY RAND() LIMIT ".$_POST['total_qus'];
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $questions = array();
        while($row = $result->fetch_assoc()) {
            $questions[] = $row['id'];
        }
        $_SESSION['qus'] = $questions;
        
       echo json_encode($questions);
        
    } else {
        echo 0;
    }

}

if(isset($_POST['action']) && $_POST['action'] == 'get_qus'){

    $qus_id = $_POST['qus_no'];

    $sql = "SELECT `qus`,`ans` FROM `qus` WHERE `id` = $qus_id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo 0;
    }

}

if(isset($_POST['action']) && $_POST['action'] == 'submit_qus'){

    $flag = 0;

    $qus_id = $_POST['qus_no'];
    $ans = $_POST['ans'];

    $sql = "SELECT `ans` FROM `qus` WHERE `id` = $qus_id";
    $result = $db->query($sql);
    $data = $result->fetch_assoc();

    $allAns = explode(",", $data['ans']);

    foreach ($allAns as $value) {
        if (strtolower($value) == strtolower($ans)) {
            $flag++;
        }
    }

    echo $flag;

}

if(isset($_POST['action']) && $_POST['action'] == 'register'){

    extract($_POST);

    $sql = "INSERT INTO `users` (`fullname`, `email`, `phone`) VALUES ('$fullname','$email','$phone')";

    if($db->query($sql)){
        echo $db->insert_id;
    } else{
        echo 0;
    }

}

if(isset($_POST['action']) && $_POST['action'] == 'show_result'){

    $update = "UPDATE `users` SET `score` = ".$_POST['score']." WHERE `id` = ".$_POST['user_id'];

    if($db->query($update)){
        echo 1;
    } else{
        echo 0;
    }

}

?>