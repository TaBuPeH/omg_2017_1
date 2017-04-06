document.addEventListener("DOMContentLoaded", loadEverything);

function loadEverything() {
    document.getElementById('start').addEventListener('click', fight);
}

function Champ (aName, aHealth) {
    this.name = aName;
    this.health = aHealth;
    this.attacks = new Array;

    this.getHealth = function() {
        return this.health;
    };
    this.setHealth = function(newHealth) {
        this.health = newHealth;
    };
    this.getName = function() {
        return this.name;
    };
    this.addAttack = function(theNewAttack) {
        this.attacks.push(theNewAttack);
    };
    this.attack = function(target) {
        var attackNum = Math.floor(Math.random() * this.attacks.length);
        var damage = this.attacks[attackNum].doAttack();
        target.setHealth(target.getHealth() - damage);

        var message = this.getName() + " attacks " + target.getName() +
            " with " + this.attacks[attackNum].getName() +
            " for " + damage + "HP " +
            target.getName() + " is at " + target.getHealth() + "HP";

        return message;
    };

}



function Attack(aName, aDmg) {

    this.dmg = aDmg;
    this.name = aName;

    this.doAttack = function() {
        return this.dmg;
    };

    this.getName = function() {
        return this.name;
    }
}



var lichking = new Champ ('Lich King', 15000);

lichking.addAttack(new Attack('Kick', 800));
lichking.addAttack(new Attack('Blade Slash', 1000));
lichking.addAttack(new Attack('Punch', 500));
lichking.addAttack(new Attack('SuperPower', 10000));


var thrall = new Champ('Tharll', 35000);

thrall.addAttack(new Attack('Kick', 500));
thrall.addAttack(new Attack('Hammer Slash', 800));
thrall.addAttack(new Attack('Punch', 300));
thrall.addAttack(new Attack('SuperPower', 4000));

var moves = new Array;
var i = 0,
    j = 0;

function fight() {


    moves[i] = "FIGHT!";
    i++;
    moves[i] = lichking.getName() + " VS " + thrall.getName();
    i++;
    moves[i] = lichking.getHealth() + "HP | " + thrall.getHealth() + "HP";
    i++;

    attacker = lichking;
    defender = thrall;

    while (attacker.getHealth() > 0) {
        moves[i] = attacker.attack(defender);
        i++;

        var temp = attacker;
        attacker = defender;
        defender = temp;

    }

    victory = defender.getName() + " wins!";
    moves[i] = victory;
    i++;
    moves[i] = "-------------";
    i++;
    fillTextBox();
}



function fillTextBox() {

    var element = document.getElementById('textbox');
    var html = element.innerHTML;


    if (j < moves.length) {
        html += "<div>" + moves[j] + "</div>";
        element.innerHTML = html;
        element.scrollTop = element.scrollHeight;
        j++;
        setTimeout(fillTextBox, 500);
    }
}