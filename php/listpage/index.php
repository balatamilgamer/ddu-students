<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">

<?php 
include "functions.php";
$where = '';
if(isset($_GET['name']) && $_GET['name']!=''){
  $where = "name like '%".$_GET['name']."%'";
  $url_Data = "&name=".$_GET['name'];
}

$data = get_data("products", "*", $where, "id ASC", "$start, $limit");
$total_count =  get_count("products", "*", $where);
?>

<h1>Total Records: <?php echo $total_count; ?></h1>

<form action="" method="get">
    <div class="row">
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" placeholder="Search">
        </div>
        <div class="col-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Search">
        </div>
    </div>
</form>

<table class="table">
    <tr>
        <td>Sno</td>
        <td>Name</td>
        <td>Price</td>
    </tr>
    <?php
    foreach($data as $row){
        echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['price']."</td>
        </tr>";
    }
    ?>
    
</table> 

<?php echo pagenation($total_count,$page,$limit,$url,$url_Data); ?>

<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->

</div>
</body>
</html>