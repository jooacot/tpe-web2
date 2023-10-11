<?php

require_once './app/controllers/travels.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'viajes'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'viajes':
        $controller = new TravelsController();
        $controller->showTravels();
     break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
    break;
    default: 
        echo "404 Page Not Found"; // corregir esto
        break;
}
