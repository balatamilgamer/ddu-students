<?php
$date = date('Y-m-d', strtotime("+10 day"));

for($i=0;$i<50;$i++){
    echo date('Y-m-d H', strtotime("+$i hour")).'<br>';
    
}
?>