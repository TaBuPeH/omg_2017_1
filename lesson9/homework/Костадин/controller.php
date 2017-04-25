<?php

session_start();

require_once('view.php');

if(isset($_POST['username']) && isset($_POST['password'])) {
    require_once('model.php');
    foreach($users as $key => $user){
        if($_POST['username'] == $user['username']){
                if($_POST['password'] == $user['password']){
                echo 'corrrect login';
                $_SESSION['logged'] = true;
                $_SESSION['loggedUser'] = $user;
                header('Location: /dashboard/php/mvc/index.php');
            };
        };
    };
    if(!isset($_SESSION['logged'])) echo 'Грешно име или парола';
};

if(isset($_POST['usernameSign']) && isset($_POST['usernameSign'])) {
    require_once('model.php');
    $newUser['username'] = $_POST['usernameSign'];
    $newUser['password'] = $_POST['passwordSign'];
    $_SESSION['newUser'] = $newUser;
    
} elseif(!isset($_POST['username'])) {
    echo 'Празно име или парола.';
}
;

?>