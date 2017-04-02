/**
 * Created by User on 1.4.2017.
 */
document.addEventListener("DOMContentLoaded", loadEverything);

function loadEverything(){
    document.getElementById('button').addEventListener('click', fight);
}

function Evytrox() {
    this.health= 2500;
    this.name="Evytrox";
    this.superpowerE=function(){
        this.health=this.health-500;
        return this.health;
    };
    this.bladework=function(){
        this.health=this.health-350;
        return this.health;
    };
    this.doublestrike=function(){
        this.health=this.health-200;
        return this.health;
    };
    this.thejudgement=function(){
        this.health=this.health-100;
        return this.health;
    };
    this.healE=function(){
        this.health=this.health+300;
        return this.health;
    };
}

function Kelcian() {
    this.health= 2500;
    this.name="Kelcian";
    this.superpowerK=function(){
        this.health=this.health-500;
        return this.health;
    };
    this.darkmagic=function(){
        this.health=this.health-350;
        return this.health;
    };
    this.stealthknife=function(){
        this.health=this.health-200;
        return this.health;
    };
    this.fear=function(){
        this.health=this.health-100;
        return this.health;
    };
    this.healK=function(){
        this.health=this.health+300;
        return this.health;
    };
}

var moves=new Array;
var i=0;
function fight(){
    var left= new Evytrox();
    var right= new Kelcian();
    moves[i]="New battle!";
    i++;
    moves[i]="Evytrox VS Kelcian";
    i++;
    moves[i]="2500HP | 2500HP";
    i++;
    while(left.health>0 && right.health>0){
        var drown=drawNum();
        switch (drown) {
            case 1:
                right.superpowerK();
                moves[i]=(left.name + " used Superpower. " + right.name + " remains at " + right.health + "HP");
                i++;
                break;
            case 2:
                right.darkmagic();
                moves[i]=(left.name + " used Dark Magic. " + right.name + " remains at " + right.health + "HP.");
                i++;
                break;
            case 3:
                right.stealthknife();
                moves[i]=(left.name + " used Stealth Knife. " + right.name + " remains at " + right.health + "HP.");
                i++;
                break;
            case 4:
                right.fear();
                moves[i]=(left.name + " used Fear. " + right.name + " remains at " + right.health + "HP.");
                i++;
                break;
            case 5:
                right.healK();
                moves[i]=(left.name + " used Heal. " + right.name + " remains at " + right.health + "HP.");
                i++;
                break;
        }
        if(right.health<=0) break;
        var drown1=drawNum();
        switch (drown1) {
            case 1:
                left.superpowerE();
                moves[i]=(right.name + " used Superpower. " + left.name + " remains at " + left.health + "HP.");
                i++;
                break;
            case 2:
                left.bladework();
                moves[i]=(right.name + " used Bladework. " + left.name + " remains at " + left.health + "HP.");
                i++;
                break;
            case 3:
                left.doublestrike();
                moves[i]=(right.name + " used Double Strike. " + left.name + " remains at " + left.health + "HP.");
                i++;
                break;
            case 4:
                left.thejudgement();
                moves[i]=(right.name + " used Judgement. " + left.name + " remains at " + left.health + "HP.");
                i++;
                break;
            case 5:
                left.healE();
                moves[i]=(right.name + " used Heal. " + left.name + " remains at " + left.health + "HP.");
                i++;
                break;
        }
    }

    var victory;
    if(left.health>right.health) {
        victory=left.name + " wins!";
        moves[i]=victory;
        i++;
        moves[i]="-------------";
        i++;
    }
    else {
        victory=right.name + " wins!";
        moves[i]=victory;
        i++;
        moves[i]="-------------";
        i++;
    }
    fillTextBox();
}

function drawNum() {
    return Math.floor(Math.random()*5) + 1;
}

var j=0;
function fillTextBox(){
    if(j<moves.length){
    document.getElementById("line1").innerHTML=document.getElementById("line2").innerHTML;
    document.getElementById("line2").innerHTML=document.getElementById("line3").innerHTML;
    document.getElementById("line3").innerHTML=document.getElementById("line4").innerHTML;
    document.getElementById("line4").innerHTML=document.getElementById("line5").innerHTML;
    document.getElementById("line5").innerHTML=document.getElementById("line6").innerHTML;
    document.getElementById("line6").innerHTML=document.getElementById("line7").innerHTML;
    document.getElementById("line7").innerHTML=moves[j];
    j++;
    setTimeout(fillTextBox, 2000);
    }
}
