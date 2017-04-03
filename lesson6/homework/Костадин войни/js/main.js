document.addEventListener("DOMContentLoaded", load);
document.addEventListener("DOMContentChanged", load);
var numFighters = 1;
var x;
var timeoutvar;

function load() {
	document.getElementById("buttonAdd").addEventListener('click', addBox);
	document.getElementById("buttonFight").addEventListener('click', function(){x = new arena(); ;repeater();});
}

function repeater(){
    x.fight();
    timeoutvar = setTimeout(repeater, 500);
    if(x.allDead()) clearTimeout(timeoutvar);
}

function hero(name, health, dmgMin, dmgMax) {
	this.name = name;
	this.health = health;
	this.dmgMin = dmgMin;
	this.dmgMax = dmgMax;
    this.alive = true;

	this.takeDmg = function(takenDmg) {
		this.health = this.health - takenDmg;
        if(this.health < 1) {
            this.alive = false;
            console.log(this.name + ' загина');
            this.health = 0;
        }
	}

	this.doDmg = function() {
		return Math.floor(Math.random() * (this.dmgMax - this.dmgMin) + this.dmgMin);
	}

	this.getHealth = function() {
		return this.health;
	}
    
	return this;
}

function arena() {
	this.fighterInput = document.querySelectorAll("input");
	this.fighters = new Array();
    this.dead = new Array();
	for (var i = 0; i < numFighters; i++){
		this.fighters[i] = new hero(this.fighterInput[4*i].value, Number(this.fighterInput[4*i+1].value), Number(this.fighterInput[4*i+2].value), Number(this.fighterInput[4*i+3].value))
	}
    
    this.fight = function() {
        for (var i = 0; i < numFighters; i++){
            for (var j = 0; j < numFighters; j++) if(i != j && this.fighters[i].alive && this.fighters[j].alive) this.match(i, j);
        }
    }
    
	this.match = function(heroIndex1, heroIndex2) {
            this.fighters[heroIndex2].takeDmg(this.fighters[heroIndex1].doDmg());
            this.fighters[heroIndex1].takeDmg(this.fighters[heroIndex2].doDmg());
            this.healthUpdater(heroIndex1);
            this.healthUpdater(heroIndex2);
	}

	this.healthUpdater = function(heroIndex) {
		this.fighterInput[heroIndex*4+1].value = this.fighters[heroIndex].getHealth();
	}
    
    this.allDead = function() {
        var alive = 0;
        for(var i = 0; i < numFighters; i++) {
            if(this.fighters[i].alive)  alive++;
        }
        if(alive <= 1){
            for(var i = 0; i < numFighters; i++) {
                if(this.fighters[i].alive)  alert(this.fighters[i].name + ' е победител!');
            }
            return true;
        } else return false;
        
    }

	console.log(this.fighters);
}

function addBox() {
	document.getElementById("body").insertAdjacentHTML('beforeend', "<div class='fighterInput'>Име на героя<br><input type='text' name='name'><br>Кръв<br><input type='text' name='health'><br>Минимална сила на удара на героя<br><input type='text' name='minDmg'><br>Максимална сила на удара на героя<br><input type='text' name='maxDmg'></div>");
	numFighters++;
}