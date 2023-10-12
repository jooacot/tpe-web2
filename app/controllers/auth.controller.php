<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController
{
    private $view;
    private $model; // falta crear UserModel para traer los datos

    function __construct(){
        $this->view = new AuthView();
        $this->model = new UserModel();
    }

    public function showLogin(){    
        $this->view->showLogin();
    }


    public function auth(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            $this->view->showLogin('Faltan datos');
            return;
        }
        $user = $this->model->getByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            AuthHelper::login($user);
            header('Location: ' . BASE_URL . 'viajes');
        } else {
            $this->view->showLogin("User invalido");
        }
    }

    public function logout(){
        AuthHelper::init();
        if (isset($_SESSION['USER_ID'])) {
            // procede con la desconexión
            AuthHelper::logout();
        }

        header('Location: ' . BASE_URL);
    }

    
}
