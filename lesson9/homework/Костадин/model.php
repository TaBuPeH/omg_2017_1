<?php

$users['admin']['username'] = "admin";
$users['admin']['password'] = "admin";

if(isset($_SESSION['newUser'])){
    $users[] = $_SESSION['newUser'];
}

?>