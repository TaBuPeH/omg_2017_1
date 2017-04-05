document.addEventListener("DOMContentLoaded", loadEverything);

function Pokemon(aName, aHealth) {
    this.name = aName;
    this.Health = aHealth;
    this.attacks = [];

    this.getName = function () {
        return this.name;
    };

    this.getHealth = function () {
        return this.Health;
    };

    this.setHealth = function (newHealth) {
        this.Health = newHealth;
    };


    this.addAttack = function(newAttack) {
        this.attacks.push(newAttack);
    };

    this.attack = function(target) {
        var attChosen = Math.floor(Math.random() * this.attacks.length);
        var damage = this.attacks[attChosen].attDmg;
        target.setHealth(target.getHealth() - damage);
        var message = this.getName() + " inflicts " + damage + " damage to " + target.getName() + " with " + this.attacks[attChosen].getAttName() + ". " + target.getName() + " is at " + target.getHealth() + "HP.";

        return message;
    };


}

function Attack(aName, aMaxDMG, aMinDMG) {
    this.attackName = aName;
    this.maxDMG = aMaxDMG;
    this.minDMG = aMinDMG;
    this.getAttName = function() {
        return this.attackName;
    };

    this.attDmg = Math.floor(Math.random()*(this.maxDMG - this.minDMG) + this.minDMG);
}

function loadEverything() {

    //var choice1 = 0;
    //var choice2 = 0;
    //
    //document.getElementById("select1").addEventListener("click", function() {
    //    choice1++;
    //});
    //
    //document.getElementById("select2").addEventListener("click", function() {
    //    choice2++;
    //});
    //
    //while(choice1 == 0 && choice2 == 0) {
    //
    //    if(document.getElementById("f1-option").checked) {
    //        document.getElementById("img1").src = "../img/Charmander.png";
    //    }
    //
    //    else if(document.getElementById("w1-option").checked) {
    //        document.getElementById("img1").src = "../img/Squirtle_.png";
    //    }
    //
    //    else if(document.getElementById("g1-option").checked) {
    //        document.getElementById("img1").src = "../img/Bulbasur.png";
    //    }
    //}
    //
    //$('input[name="selector"]').on('change', function(){
    //    if ($(this).val()=='1') {
    //        $("#img1").attr("src","sth");
    //    }
    //});

document.getElementById("addButton").addEventListener("click", function() {

    var Pokemon1 = new Pokemon(document.getElementById("name1").value ,document.getElementById("HP1").value);
    Pokemon1.addAttack(new Attack(document.getElementById("fAttName1").value), document.getElementById("maxAtt1").value, document.getElementById("minAtt1").value);
    Pokemon1.addAttack(new Attack(document.getElementById("fAttName2").value), document.getElementById("maxAtt1").value, document.getElementById("minAtt1").value);
    Pokemon1.addAttack(new Attack(document.getElementById("fAttName3").value), document.getElementById("maxAtt1").value, document.getElementById("minAtt1").value);

    var Pokemon2 = new Pokemon(document.getElementById("name2").value ,document.getElementById("HP2").value);
    Pokemon2.addAttack(new Attack(document.getElementById("sAttName1").value), document.getElementById("maxAtt2").value, document.getElementById("minAtt2").value);
    Pokemon2.addAttack(new Attack(document.getElementById("sAttName2").value), document.getElementById("maxAtt2").value, document.getElementById("minAtt2").value);
    Pokemon2.addAttack(new Attack(document.getElementById("sAttName3").value), document.getElementById("maxAtt2").value, document.getElementById("minAtt2").value);


document.getElementById("button").addEventListener("click", startFighting);

var moves = [];
var i = 0, j = 0;

function startFighting() {

    moves[i] = Pokemon1.getName() + " VS " + Pokemon2.getName();
    i++;
    moves[i] = Pokemon1.getHealth() + "HP | " + Pokemon2.getHealth() + "HP";
    i++;

    var attacker = Pokemon1;
    var defender = Pokemon2;

    while (attacker.getHealth() > 0) {
        moves[i] = attacker.attack(defender);
        i++;

        var temp = attacker;
        attacker = defender;
        defender = temp;

    }

    moves[i] = defender.getName() + " wins!";
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
});}