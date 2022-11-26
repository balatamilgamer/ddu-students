<?php 

$cars = array("Volvo","BMW","Toyota");

echo '<ul>';

for($i = 0; $i < count($cars); $i++){
    echo "<li>".$cars[$i]."</li>";
}

echo '</ul>';

echo '<ul>';
foreach($cars as $kadi){
    echo "<li>".$kadi."</li>";
}
echo '</ul>';


?>