<?php

require_once './app/controllers/travels.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/clients.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'viajes'; // accion por defecto
if (!empty($_GET['action'])) {
  $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
  case 'viajes':
    $TravelsController = new TravelsController();
    $TravelsController->showTravels();
    break;
  case 'login':
    $AuthController = new AuthController();
    $AuthController->showLogin();
    break;
  case 'validate':
    $AuthController = new AuthController();
    $AuthController->auth();
    break;
  case 'logout':
    $AuthController = new AuthController();
    $AuthController->logout();
    break;
  case 'detailsTravel':
    $TravelsController = new TravelsController();
    $TravelsController->showDetails($params[1]);
    break;
  case 'addTravel':
    $TravelsController = new TravelsController();
    $TravelsController->addTravel();
    break;
  case 'deleteTravel':
    $TravelsController = new TravelsController();
    $TravelsController->removeTravel($params[1]);
    break;
  case 'editTravel':
    $TravelsController = new TravelsController();
    if(!empty($params[1])){
      $TravelsController->editTravel($params[1]);
    } else {
      header("Location: ".BASE_URL);
    }
    break;
    case 'clientes':
      $ClientsController = new ClientsController();
      $ClientsController->showClients();
      break;
      case 'detailsClient':
        $ClientsController = new ClientsController();
        $ClientsController->showDetailsClients($params[1]);
        break;
      case 'addClient':
        $ClientsController = new ClientsController();
        $ClientsController->addCliente();
        break;
      case 'deleteClient':
        $ClientsController = new ClientsController();
        $ClientsController->removeClient($params[1]);
        break;
      case 'editClient':
        $ClientsController = new ClientsController();
        if(!empty($params[1])){
          $ClientsController->editClients($params[1]);
        } else {
          header("Location: ".BASE_URL);
        }
        break;
        default:
        echo "404 Page Not Found"; // corregir esto
        break;
}
