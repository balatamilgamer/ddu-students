<?php 

include 'login_check.php';

if(isset($_GET['msg']) && $_GET['msg']!=""){
    echo $_GET['msg'];
}

?>


<table>
    <tr>
        <th>Sno</th>
        <th>Book</th>
        <th>Student</th>
        <th>Out Time</th>
        <th>In Time</th>
        <th>Action</th>
    </tr>
    <?php 
    $sql = "SELECT r.id,b.bname as bookname,s.name as student_name,r.intime,r.outime FROM rent_book r 
    INNER JOIN books b ON r.bid = b.id
    INNER JOIN users s ON r.sid = s.id
    WHERE 1";

    $result = $db->query($sql);

    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['bookname']."</td>";
        echo "<td>".$row['student_name']."</td>";
        echo "<td>".$row['outime']."</td>";
        echo "<td>".$row['intime']."</td>";
        echo "<td><a href='rent_return.php?id=".$row['id']."'>Return</a></td>";
        echo "</tr>";
    }

    ?>
</table>