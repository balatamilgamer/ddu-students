<?php

$data = "TATA, BMW, TOYOTA, HONDA, AUDI, MERCEDES";

$car = explode(", ", $data);

echo '<ul>';
foreach($car as $kadi){
    echo "<li>".$kadi."</li>";
}
echo '</ul>';


?>