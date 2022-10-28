<table border=1>
    <tr>
        <td>sno</td>
        <td>name</td>
        <td>email</td>
        <td>action</td>
    </tr>
    <?php
    
    include 'db.php';
    
    $sql = "select * from student";
    $result = $db->query($sql);
    //print_r($result);

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
          echo "<tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td><a href='edit.php?id=$row[id]'>Edit</a>
                <a href='delete.php?id=$row[id]'>Delete</a></td>
                </tr>
                ";   
        }

    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }

    
    ?>
</table>


<?php

if(isset($_GET['msg'])){
    echo $_GET['msg'];
}

?>