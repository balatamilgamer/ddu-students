<?php 

$db = new mysqli("localhost", "root", "", "dummy_db");

$limit = 1;

if(isset($_GET['page'])){
    $page = $_GET['page'];
    $start = ($page-1)*$limit;
} else {
    $page = 1;
    $start = 0;
}


$url = "http://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";

function get_count($table, $fields, $where = null){
    global $db;
    $sql = "SELECT COUNT(*) AS total FROM $table";
    if ($where != null) {
        $sql .= " WHERE $where";
    }
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

function get_data($table, $fields, $where = null, $order = null, $limit = null) {
    global $db;
    $sql = "SELECT $fields FROM $table";
    if ($where != null) {
        $sql .= " WHERE $where";
    }
    if ($order != null) {
        $sql .= " ORDER BY $order";
    }
    if ($limit != null) {
        $sql .= " LIMIT $limit";
    }
    $result = $db->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function pagenation($total,$page,$limit,$url,$where=null){

    $total_page = ceil($total/$limit);

    $print_data = "<ul class='pagination'>";
    if($page > 1){
        $print_data .= "<li class='page-item'><a class='page-link' href='".$url."?page=1".$where."'>First</a></li>";
        $print_data .= "<li class='page-item'><a class='page-link' href='".$url."?page=".($page-1).$where."'>Previous</a></li>";
    }
    
    if($total_page!=$page){
        $print_data .= "<li class='page-item'><a class='page-link' href='".$url."?page=".($page+1).$where."'>Next</a></li>";
        $print_data .= "<li class='page-item'><a class='page-link' href='".$url."?page=".$total_page.$where."'>Last</a></li>";
    }


    $print_data .= "</ul>";

    return $print_data;
}

?>