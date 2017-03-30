/**
 * Created by Alex on 29.3.2017 г..
 */

document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("button").addEventListener('click', function(){
        ourSlots = document.querySelectorAll('.slot div');
        resetSlots();
        setTimeout(function() {
            getRandomNumber();
            br = 0;
            setNumbers();
            console.log(numbers);
        }, 1000);
    });
});

var ourSlots = document.querySelectorAll('.slot div');
var br = 0;
var numbers;

function getRandomNumber() {
    var br = 0;
    numbers = new Array;
    newNumber = Math.floor(Math.random() * 49) + 1;
    numbers[br] = newNumber;
    br++;

    while (numbers.length < 6) {

        newNumber = Math.floor(Math.random() * 49) + 1;
        if (numbers.length >= 1) {
            for (i = 0; i < numbers.length; i++) {
                while (newNumber == numbers[i]){
                    newNumber = Math.floor(Math.random() * 49) + 1;
                }
            }
        }
        numbers[br] = newNumber;
        br++;
    }
    console.log(numbers);
    console.log(ourSlots)
}

function setNumbers() {
    if (br < numbers.length) {
        ourSlots[br].innerHTML = numbers[br];
        setTimeout(setNumbers,1000);
        br++;
    } else {
        for(i = -1; i < 5; i++) {
            numbers.pop();
        }
    }
}

function resetSlots() {
    var br = 0;
    for (i = 0; i < 6; i++){
        ourSlots[i].innerHTML = "&nbsp;";
    }
}