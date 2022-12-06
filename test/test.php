<?php 

$array = array(0 => 'blue', 1 => 'red', 2 => 'green string', 3 => 'reds');
$search = "Red";

foreach ($array as $value) {
    if (strtolower($value) == strtolower($search)) {
        echo "Found $search";
    }
}


?>