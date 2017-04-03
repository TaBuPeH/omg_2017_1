$(document).ready(function () {

    var Hero = function (name, health, attack) {
        var name = name;
        var health = health;
        var attack = attack;

        this.getHealth = function () {
            return health;
        }

        this.setHealth = function (newHealth) {
            health = newHealth;
        }

        this.getAttack = function () {
            return attack;
        }

        this.getName = function () {
            return name;
        }
    }

    var Arena = function (fHero, sHero) {
        var fHero = fHero;
        var sHero = sHero;

        this.fightHeroes = function () {
            var winner;

            while (true) {
                fHero.setHealth(fHero.getHealth() - sHero.getAttack());
                if (fHero.getHealth() <= 0) {
                    winner = sHero;
                    break;
                }

                sHero.setHealth(sHero.getHealth() - fHero.getAttack());
                if (sHero.getHealth() <= 0) {
                    winner = fHero;
                    break;
                }
            }

            return winner;
        }
    }

    var batman = new Hero("Batman", 170, 20);
    var superman = new Hero("Superman", 240, 12);
    var spiderman = new Hero("Spiderman", 70, 45);

    var fHero, sHero;
    var arena;

    function chooseHero(hero, remDiv) {
        var player = $("#message").attr("player");
        if (player == "1") {
            fHero = hero;

            remDiv.remove();
            $("#message").attr("player", "2");
            $("#message").text("Player 2 choose a hero:");
        } else {
            sHero = hero;
            arena = new Arena(fHero, sHero);
            $("#result").text(arena.fightHeroes().getName() + " wins!");
            $("#heroes").remove();
        }
    }

    $("#batman").on("click", function () {
        chooseHero(batman, $(this));
    });

    $("#superman").on("click", function () {
        chooseHero(superman, $(this));
    });

    $("#spiderman").on("click", function () {
        chooseHero(spiderman, $(this));
    });
});