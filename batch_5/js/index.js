var age = 21;
var output = "ticket price is ";
var price = 0;

if(age <= 5){
    price = 0;
} 
else if(age > 5 && age <= 10){
    price = 50;
}
else{
    price = 100;
}

console.log(output + "rupees " + price);