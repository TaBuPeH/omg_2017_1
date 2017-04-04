/**
 * Created by Alex on 31.3.2017 г..
 */

document.addEventListener("DOMContentLoaded", loadEverything);

function loadEverything() {
    document.getElementById('startBtn').addEventListener('click', fight);
}

function Champion(aName, aHealth)  {

    this.name = aName;
    this.health = aHealth;
    this.attacks = new Array;

    this.getHealth = function(){
        return this.health;
    };

    this.getName = function() {
        return this.name;
    };

    this.setHealth = function(newHealth) {
        this.health = newHealth;
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

    this.name = aName;
    this.dmg = aDmg;

    this.doAttack = function(){
        return this.dmg;
    };

    this.getName = function() {
        return this.name;
    };
}

var batman = new Champion("The future Batman", 3000);
var superman = new Champion("The caveman Superman", 4000);

batman.addAttack(new Attack("Batarang", 800));
batman.addAttack(new Attack("BatPunch", 500));
batman.addAttack(new Attack("BatKick", 900));
batman.addAttack(new Attack("BatMobileCrash", 1500));

superman.addAttack(new Attack("SuperPunch", 600));
superman.addAttack(new Attack("SuperKick", 100));
superman.addAttack(new Attack("Laser", 800));
superman.addAttack(new Attack("SuperSpeedIrrelevantPunchingPower", 1000));

var moves = new Array;
var i = 0, j = 0;

function fight() {

    moves[i] = "From the towering cities of the far future, to the wild and monstrous world of the remote past,";
    i++;
    moves[i] = " sweeps a terrific feud between two mighty costumed figures";
    i++;
    moves[i] = batman.getName() + " VS " + superman.getName();
    i++;
    moves[i] = batman.getHealth() + "HP | " + superman.getHealth() + "HP";
    i++;

    attacker = batman;
    defender = superman;

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

    var element = document.getElementById('textBox');
    var html = element.innerHTML;


    if (j < moves.length) {
        html += "<div>" + moves[j] + "</div>";
        element.innerHTML = html;
        element.scrollTop = element.scrollHeight;
        j++;
        setTimeout(fillTextBox, 500);
    }
}