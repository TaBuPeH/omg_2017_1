document.addEventListener('DOMContentLoaded', function() {


    document.getElementById('ourButton').addEventListener('click', function() {


        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'info.html');

        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText);

                var result = JSON.parse(xhr.responseText);

                console.log(result);


                document.getElementById('ourInfo').innerHTML = result.name;
            } else {
                console.log(xhr.status);
            }
        };
        xhr.send();




    });
});