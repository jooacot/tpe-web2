<?php
require_once './app/views/auth.view.php';

class AuthController {
    private $view;
    private $model; // falta crear UserModel para traer los datos

    function __construct() {
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }
}
?>