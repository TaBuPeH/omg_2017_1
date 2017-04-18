<?php

require_once('../lib.php');
require_once('model.php');

if (!empty( $_POST )) {
    if ($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']) {
        $_SESSION['is_logged'] = 1;
       
        header('Location: /success.php');
    } else {
        echo "wrong username or password";
    }
}


require_once('view.php');
