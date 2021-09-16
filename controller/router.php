<?php

$var_getMenu = isset($_GET['menu']) ? $_GET['menu'] : 'home';
echo "<br>";

switch ($var_getMenu){
    case "home":
        require_once('./views/home.php');
        break;
    case "login":
        require_once('./views/login.php');
        break;
    case "register":
        require_once('./views/register.php');
        break;
    case "about":
        require_once('./views/about.php');
        break;
    default:
        require_once('./views/home.php');
}

?>
