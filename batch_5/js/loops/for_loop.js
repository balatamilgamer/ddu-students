for(var i = 1; i <= 10; i++) {
    console.log(i);
}


var cars = ["Saab", "Volvo", "BMW"];
var count = cars.length;

for(var i = 0; i < count; i++) {
    console.log(cars[i]);
}

for(var i = count; i > 0 ; i--) {
    var index = i - 1;
    console.log(cars[index]);
}