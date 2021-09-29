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
    case "alumnos":
        require_once('./views/alumnos.php');
        break;
    case "logout":
        require_once('./views/logout.php');
        break;
    case "delete":
        $_idalumno = trim(filter_input(INPUT_GET, 'idalumno'));
        require_once('./model/modelAlumnos.php');
        $sqlAlumnos = modelAlumnos::delete($_idalumno);
        header("location:?menu=alumnos");
        break;
    default:
        require_once('./views/home.php');
}

?>
