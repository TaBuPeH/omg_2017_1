<?php


if (!isset($_GET['url']) || empty($_GET['url'])) {
    $_GET['url'] = 'home/index';
}

$url = explode('/', $_GET['url']);


$className = ucfirst(strtolower($url[0]))."Controller";


// controllers/UsersController.php
require_once("controllers/".$className.".php");



$currentClass = new $className();

//ArticlesController->list();
$currentClass->{$url[1]}();
