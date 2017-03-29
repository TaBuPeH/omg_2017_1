/*document.addEventListener("DOMContentLoaded", loadEverything);

function loadEverything() {

    document.getElementById('ourButton').addEventListener('click', clickButton);
}

function clickButton() {

    document.getElementById('test').style.backgroundColor = "blue";
    console.log('I was clicked');

    // if we have less than 6 numbers;
    // if we need to call this - do this
    setTimeout(clickButton, 1000)
}

*/

/*
var a = 0;

var b = function() {

    a = 3;

    a = function() {
        console.log('show X');
    }


}

console.log(a);
b();
a();
console.log(a);

*/


document.addEventListener('DOMContentLoaded', function() {

    console.log(document.getElementById('test').clientWidth)

    document.getElementById('ourButton').addEventListener('click', function() {
        /*
                // HTML ELEMENT COLLECTION 1 > elements
                var ourLis = document.querySelectorAll("li");

                for (i = 0; i < ourLis.length; i++) {
                    ourLis[i].style.backgroundColor = "red";
                }
                console.log(ourLis);
        */
    });


    var ourLis = document.querySelectorAll("li");

    for (i = 0; i < ourLis.length; i++) {
        ourLis[i].addEventListener('click', function() {


        })
    }
    //document.querySelectorAll("li");

});

$(document).ready(function() {


    $('#ourButton').on('click', function() {
        console.log($('li').eq(2).index());
        //  $('li').eq().css('background-color', "red");
    });

    $('li').on('click', function() {

        var color = $(this).attr('my-color');
        $(this).css('background-color', color);
        console.log($(this).index());
    });
});


$(document).on('click', '.newDiv', function() {

    console.log('here');

})









function Car(color, brand) {

    this.color = color;
    this.brand = brand;
    this.km = 0;


    this.move = function(distance) {
        this.km = this.km + distance;
    };

    this.moreGas = function() {
        this.km = this.km + 100;
    };

    return this;
}

var x = new Car('red', 'bmw');

x.moreGas();
console.log(x);
x.move(200);
console.log(x);
x.move(200);
console.log(x);


// innerWidth CHrome outerWidht width-- FF clientWidht-- IE