<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

$db = new mysqli('localhost', 'root', '', 'dummy_db');

$data = '<table border=1><tr><td>id</td><td>title</td><td>des</td><td>time</td><td>print</td></tr>';

$sql = "SELECT * FROM `posts` Where 1 limit 0,10";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){

    $data.= '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['title'].'</td>
        <td>'.$row['description'].'</td>
        <td>'.$row['date'].'</td>
        <td><button data-id="'.$row['id'].'" class="printbtn">print</button></td>
    </tr>';

}

$data.= '</table>';

echo $data;

?>

<div id="print">
    <h1>Print</h1>
    <br>
    <br>
    <br>

    <h3 id="title"></h3>
    <p id="pg"></p>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function(){

        function printData()
        {
            var divToPrint=document.getElementById("print");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        $('.printbtn').click(function(){
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {id:id},
                success: function(data){
                    var data = JSON.parse(data);
                    console.log(data);
                    $('#title').html(data.title);
                    $('#pg').html(data.description);
                   //window.print();
                   printData();
                }
            });
        });
        
    });
</script>

    </body>
</html>