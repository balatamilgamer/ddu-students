function welcome(name){
    var data = "hello " + name;
    console.log(data);
}


//welcome("Bala");
//welcome("Kumar");

function sum(a, b){
    var result = a + b;
    console.log(result);
}

//sum(10, 20);


function bill(ounit,cunit){

    var unit = cunit - ounit; // 300 - 100 = 200
    var price = 0;
    var total = 0;
    var gst = 0;
    var gtotal = 0;

    if(unit <= 100){
        price = 0;
    } else {

        unit = unit - 100;
        
        if(unit <= 200){
            price = 2;
        } else if (unit > 200){
            price = 3;
        } else {
            price = 5;
        }

    }

    total = price * unit;
    gst = total * 0.18;

    gtotal = total + gst;

    var result = {
        b_unit: unit,  //name: value
        b_price: price,
        b_total: total,
        b_gst: gst,
        b_gtotal: gtotal
    };

    return result;

}


var output = bill(100, 300);

console.log(output.b_gtotal);



// arrow function

const carDetails = (name, model) => {
    console.log(name, model);
}

carDetails("BMW", "X5");

