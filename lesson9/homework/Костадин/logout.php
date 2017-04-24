<?php

session_start();

unset($_SESSION['logged']);

header('Location: /dashboard/php/mvc/index.php');

?>