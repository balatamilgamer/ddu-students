<?php
$err = "";

function checkemail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

if(isset($_POST['name'])){
    
    extract($_POST);

    if(checkemail($email)){
        $err = "Email is valid";
    } else{
        $err = "Invalid email address";
    }
    
    echo $err;
    exit;

    if($name!="" && $address!="" && $units!=""){

        if($units <= 100){ $price = 0; }
        elseif($units > 100 && $units <=200){ $price = 1; }
        else{ $price = 2; }

        $total = $units * $price;

    } else{
        $err = "Please fill all data";
    }

}

?>

<form action="" method="POST">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="email" placeholder="email"><br>    
    <input type="text" name="address" placeholder="Address"><br>
    <input type="text" name="units" placeholder="Units"><br>
    <input type="submit" name="submit">
</form>

<?php if(isset($_POST['name']) && $err==""){ 

echo "<h1>Name: $name</h1>
<p>Address: $address</p>
<p>Units: $units ; Price: $price ;</p>
<h2>Total: $total</h2>";

} else { echo $err; }?>