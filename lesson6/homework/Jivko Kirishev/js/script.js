$(document).ready(function () {


    $('button').on('click', function () {
        $(this).attr("disabled", true);
        var numbers = [];

        while (numbers.length != 6) {
            var num = Math.floor(Math.random() * 49) + 1;
            var arrLength = numbers.length;
            var areEq = false;

            for (var i = 0; i < arrLength; i++) {
                if (numbers[i] == num) {
                    areEq = true;
                    break;
                }
            }

            if (!areEq) {
                numbers[arrLength] = num;
            }
        }

        var divFields = 0;
        (function addNum() {
            setTimeout(function () {
                if (divFields < 6) {
                    $('div#lottery-nums div').eq(divFields).text(numbers[divFields]);
                    divFields++;
                    addNum();
                }
            }, 1000);
        })();
    });
});