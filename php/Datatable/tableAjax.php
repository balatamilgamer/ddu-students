<?php 

include 'db.php';

//print_r($_POST['columns'][0]['data']);

foreach($_POST['columns'] as $column){
    $sql_col[] = ($column['data']);
}

$col = implode(', ', $sql_col);

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length']; // Rows display per page
$table = $_POST['table'];
$search = $_POST['search']['value']; // Search value

// Search
foreach($sql_col as $cols){
    $search_sql[] = $cols . " LIKE '%" . $search . "%'";
}

$search_sql = implode(' OR ', $search_sql);



$sql = "SELECT $col FROM $table WHERE $search_sql";
$query = $db->query($sql);
$totalData = $query->num_rows;

$sql = "SELECT $col FROM $table WHERE $search_sql LIMIT $start, $length";
$query = $db->query($sql);

//echo $sql;

while($row = $query->fetch_assoc()) {
    $data[] = $row;
}

$json_data = array(
    "draw" => intval($draw),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalData),
    "data" => $data
);

echo json_encode($json_data);


//print_r($_POST);

?>