document.addEventListener("DOMContentLoaded", loadEverything);

var drawn = new Array;
var elements;

function loadEverything() {
	document.getElementById('starter').addEventListener('click', fillArray);
	document.getElementById('clear').addEventListener('click', emptyArray);
	elements = document.querySelectorAll(".box");
}

function fillArray() {
	while(drawn.length < 6){
		var draw = drawNum();
		var flag = 0;
		for (var i = drawn.length - 1; i >= 0; i--) {
			if(drawn[i] == draw) flag = 1;
		}
		if(flag == 0) drawn[drawn.length] = draw; 
		else flag = 0;
	}
	displayArray();
}

function emptyArray(){
	for(i = 0; i < elements.length; i++){
		elements[i].innerHTML = '';
	}
	console.log(drawn);
	for (var i = 0; i < 6; i++) {
		drawn.pop();
	}
	br = 0;

}

function drawNum() {
	return Math.floor(Math.random()*49) + 1;
}

var br = 0;
function displayArray(){
		if(br < elements.length){
		elements[br].innerHTML = drawn[br];
		br++;
		setTimeout(displayArray, 1000);
	}
}