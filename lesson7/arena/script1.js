/**
 * Created by User on 1.4.2017.
 */
document.addEventListener("DOMContentLoaded", loadEverything);

function loadEverything() {
    document.getElementById('button').addEventListener('click', fight);
}

function Hero(aName, aHealth) {
    this.name = aName;
    this.health = aHealth;
    this.attacks = [];

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



function Attack(aMin, aMax, aName, aMessage) {

    this.min = aMin;
    this.max = aMax;
    this.name = aName;
    this.message = aMessage;

    this.doAttack = function() {

        var damage = Math.floor(Math.random() * (this.max - this.min) + this.min);
        return damage;
    };

    this.getName = function() {
        return this.name;
    }
}



var hero1 = new Hero('Evytrox', 2500);

hero1.addAttack(new Attack(300, 500, 'SuperPower'));
hero1.addAttack(new Attack(100, 350, 'Blade Work'));
hero1.addAttack(new Attack(100, 200, 'Double Strike'));
hero1.addAttack(new Attack(20, 100, 'Judgement'));


console.log(hero1);


var hero2 = new Hero('Kelcian', 2500);

hero2.addAttack(new Attack(300, 500, 'SuperPower'));
hero2.addAttack(new Attack(100, 350, 'Blade Work'));
hero2.addAttack(new Attack(100, 200, 'Double Strike'));
hero2.addAttack(new Attack(20, 100, 'Judgement'));



var moves = new [];
var i = 0,
    j = 0;

function fight() {


    moves[i] = "New battle!";
    i++;
    moves[i] = hero1.getName() + " VS " + hero2.getName();
    i++;
    moves[i] = hero1.getHealth() + "HP | " + hero2.getHealth() + "HP";
    i++;

    attacker = hero1;
    defender = hero2;

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

    var element = document.getElementById('text_box');
    var html = element.innerHTML;


    if (j < moves.length) {
        html += "<div>" + moves[j] + "</div>";
        element.innerHTML = html;
        element.scrollTop = element.scrollHeight;
        j++;
        setTimeout(fillTextBox, 500);
    }
}