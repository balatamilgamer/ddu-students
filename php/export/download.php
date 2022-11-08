<?php 

$db = new mysqli('localhost', 'root', '', 'dummy_db');

$data = '<table><tr><td>id</td><td>title</td><td>des</td><td>time</td></tr>';

$sql = "SELECT * FROM `posts`";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){

    $data.= '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['title'].'</td>
        <td>'.$row['description'].'</td>
        <td>'.$row['date'].'</td>
    </tr>';

}

$data.= '</table>';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $data;

exit;

?>