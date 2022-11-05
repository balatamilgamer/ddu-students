<?php

session_start();
ob_start();

if(!isset($_SESSION['user']) || $_SESSION['user']==''){
    header('location: login.php');
}

include 'functions/db.php';



class User {
    public $id;
    public $name;
    public $email;
    public $profile_img;
    public $user_data;

    public function __construct($id){
        $this->id = $id;
    }

    public function get_user(){
        global $db;

        $sql = "SELECT * FROM users WHERE id = $this->id";

        $result = $db->query($sql);

        if($result->num_rows > 0){
            $this->user_data = $result->fetch_assoc();
        }

        return $this->user_data;

    }

}

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = $_SESSION['user']['id'];
}
echo $id;
$userData = new User($id);

$userArray = $userData->get_user();

print_r($userArray);

?>