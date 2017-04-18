<?php

require_once('lib.php');


unset($_SESSION['is_logged']);


header('Location: /index.php');
