/**
 * Created by User on 29.3.2017.
 */
document.addEventListener("DOMContentLoaded", load);

var numbers=new Array;
var elements;

function load(){
    document.getElementById('button').addEventListener('click', fillArr)
    elements = document.querySelectorAll(".number");
}
function drawNum() {
    return Math.floor(Math.random()*49) + 1;
}

function fillArr(){
    while(numbers.length<6){
        var num = drawNum();
        var exists = 0;
        for (var i = numbers.length - 1; i >= 0; i--) {
            if(numbers[i] == num) exists = 1;
        }
        if(exists == 0) numbers[numbers.length] = num;
    }
    displayArr();
}
var br=0;
function displayArr(){
    if(br < elements.length){
        elements[br].innerHTML = numbers[br];
        elements[br].style.backgroundColor="#CABE8A";
        br++;
        setTimeout(displayArr, 1000);
    }
}
