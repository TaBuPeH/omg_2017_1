<html>
    <head>
        <link rel='stylesheet' href='home.css'>
    </head>
    <body>
    </body>
</html>

<?php

session_start();

if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
    echo 'Логнат си.';
    echo "<pre>";
    var_dump($_SESSION['loggedUser']);
    echo '<br><a href="/dashboard/php/mvc/logout.php">LOG OUT</a>';
} else {
    echo 'Не си логнат.';
    echo '<br><a href="/dashboard/php/mvc/controller.php">LOG</a>';
}

?>