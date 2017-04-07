<?php
// open session
class UsersController
{

    function login()
    {
        // include some information from models
        if (!empty( $_POST )) {
            if ($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']) {
                $_SESSION['is_logged'] = 1;
       
                header('Location: /success.php');
                // redirect to /home/success
            } else {
                echo "wrong username or password";
            }
        }

        require_once('views/Users/login.php');
    }

    function register()
    {

        echo "register";
         require_once('views/Users/register.php');
    }

    function logout()
    {
        unset($_SESSION['is_logged']);


        header('Location: /index.php');
    }
}
