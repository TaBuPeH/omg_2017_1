<?php
session_start();

$path = explode('/', $_SERVER['REQUEST_URI']);

$path[1]; // this will be the controller name;

$path[2]; // this will be the action we will execute



function isAuthenticated()
{
  
    if ($_SESSION['is_logged']) {
      // do nothing
    } else {
        header("Location: /users/controller.php");
    }
}
