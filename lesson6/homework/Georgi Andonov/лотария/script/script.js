document.addEventListener("DOMContentLoaded", loadEverything);

var numbers;
var drawnNumbers = [];


function loadEverything() {
    document.getElementById("startButton").addEventListener("click", drawNumbers);
    document.getElementById("clearButton").addEventListener("click", clearNumbers);
    numbers = document.querySelectorAll(".toto");
}

function drawNumbers() {
    var lengthNumArr;
    var err = 0;
    while(drawnNumbers.length != 6) {
        lengthNumArr = drawnNumbers.length;
        var newNumber =  Math.floor(Math.random() * 49) + 1;
        for(var i = 0; i<drawnNumbers.length; i++)
        {
            if(drawnNumbers[i] == newNumber) {
                err++;
            }
        }
       //if(err>0) {
       //    var newNumber2;
       //    do{
       //        newNumber2 =  Math.floor(Math.random() * 49) + 1;
       //    }while(newNumber == newNumber2);
       //    drawnNumbers[lengthNumArr] = newNumber2;
       //}
       // else {
       //    drawnNumbers[lengthNumArr] = newNumber;
       //}
        // Not working, but I am not really sure why...
        if(err == 0) {
            drawnNumbers[lengthNumArr] = newNumber;
        }
        else {
            err = 0;
        }
    }

    showNumbers();
}

var br = 0;
function showNumbers() {
    if(br < 6){
        numbers[br].innerHTML = drawnNumbers[br];
        br++;
        setTimeout(showNumbers, 1000);
    }
}

function clearNumbers() {
    for(var i = 0; i<6; i++){
        numbers[i].innerHTML = " ";
    }
    for(var j = 0; j<6; j++)
    {
        drawnNumbers.pop();
    }
    //drawnNumbers.splice(0, 6); Displays undefined after 5-6 iteration.
    br = 0;
}
