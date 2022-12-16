<?php 

include 'crud_oops.php';

$crud = new crud();

$table = "student";
$data = array("name"=>"balakumar","email"=>"bala@gmail.com","password"=>7894561230);

echo $crud->insert($table, $data);

?>