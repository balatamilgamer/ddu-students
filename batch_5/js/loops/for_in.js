
const cars = {
    saab: 100000,
    volvo: 200000,
    bmw: 300000
}

for(var key in cars) {
    console.log(key + " Price " + cars[key]);
}