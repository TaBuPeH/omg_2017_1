<?php


// UsersController;

if (!isset($_GET['url']) || empty($_GET['url'])) {
    $_GET['url'] = 'home/index';
}

$url = explode('/', $_GET['url']);

$className = ucfirst($url[0])."Controller";


// controllers/UsersController.php
require_once("controllers/".$className.".php");

$currentClass = new $className();

$currentClass->{$url[1]}();

//isAuthenticated();
// check if someone is logged in (in some variable)

// if he is not logged in => redirect to users/controller.php

// if he is logged in => redirect him to success.php
