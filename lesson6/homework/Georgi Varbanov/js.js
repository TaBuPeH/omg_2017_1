document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("button").addEventListener('click', function(){
        ourNumbers = document.querySelectorAll('.numberText');
        randNumber();
        setNumbers();
    })
});

var ourNumbers = document.querySelectorAll('.numberText');
var br = 0;
var numbers = new Array;

function randNumber() {
    var br = 0;
    numbers = new Array;

    while (numbers.length < 6) {
        newNumber = Math.floor(Math.random() * 49) + 1;
        numbers[br] = newNumber;
        br++;
    }
}


function setNumbers() {
    if (br < numbers.length) {
        ourNumbers[br].innerHTML = numbers[br];
        setTimeout(setNumbers, 1000);
        br++;
    }
}