document.addEventListener("DOMContentLoaded", function() {

    var Batman = {
      healthPointsBatman:"3600",
        batarang: function() {
            Superman.healthPointsSuperman = Superman.healthPointsSuperman - 600;
            console.log("Batman has just inflicted 600 damage to Superman");
            console.log("************************************************");
        },

        explosiveGranade: function() {
            Superman.healthPointsSuperman = Superman.healthPointsSuperman - 1000;
            console.log("Batman has just inflicted 1000 damage to Superman");
            console.log("************************************************");
        },

        kryptoniteBlade: function() {
            Superman.healthPointsSuperman = Superman.healthPointsSuperman - 2000;
            console.log("Batman has just inflicted 2000 damage to Superman");
            console.log("************************************************");
        },

        healingPotion: function() {
            this.healthPointsBatman = this.healthPointsBatman + 500;
            console.log("Batman has just healed for 500 hp");
            console.log("************************************************");
        }
    };

    var Superman = {
        healthPointsSuperman: "4200",
        laserBeams: function() {
            Batman.healthPointsBatman = Batman.healthPointsBatman - 1100;
            console.log("Superman has just inflicted 1100 damage to Batman");
            console.log("************************************************");
        },

        megaPunch: function() {
            Batman.healthPointsBatman = Batman.healthPointsBatman - 900;
            console.log("Superman has just inflicted 900 damage to Batman");
            console.log("************************************************");
        },

        neckCracker: function() {
            Batman.healthPointsBatman = Batman.healthPointsBatman - 1900;
            console.log("Superman has just inflicted 1900 damage to Batman");
            console.log("************************************************");
        },

        selfHealing: function() {
            this.healthPointsSuperman = this.healthPointsSuperman + 300;
            console.log("Superman has just healed for 300 hp");
            console.log("************************************************");
        }
    };

    var announcer = document.getElementById("finalMessage");

    document.getElementById("fightButton").addEventListener("click", letTheFightBegin);


    function letTheFightBegin() {
        var skillSelectorBatman;
        var skillSelectorSuperman;
        console.log("Combat log: ");
        while(Batman.healthPointsBatman >0 && Superman.healthPointsSuperman > 0 ) {
            skillSelectorBatman = Math.floor(Math.random()*3) + 1;
            skillSelectorSuperman = Math.floor(Math.random()*3) + 1;

            switch(skillSelectorBatman) {
                case 1: Batman.batarang();
                    break;
                case 2: Batman.explosiveGranade();
                    break;
                case 3: Batman.kryptoniteBlade();
                    break;
            }

            switch(skillSelectorSuperman) {
                case 1: Superman.laserBeams();
                    break;
                case 2: Superman.megaPunch();
                    break;
                case 3: Superman.neckCracker();
                    break;
            }
            Batman.healingPotion();
            Superman.selfHealing();
        }

        if(Batman.healthPointsBatman <= 0) {
            console.log("Batman died. Superman wins!");
            announcer.innerHTML = " Superman wins! ";
        }

        else if(Superman.healthPointsSuperman <= 0) {
            console.log("Superman died. Batman wins!");
            announcer.innerHTML = " Batman wins! ";
        }

        //else if(Batman.healthPointsBatman <= 0 && Superman.healthPointsSuperman <=0){
        //    console.log("Both characters died during the battle.");
        //    announcer.innerHTML = " Both characters died. ";
        //}
    }
});
