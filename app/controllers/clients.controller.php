<?php
require_once './app/models/clients.model.php';
require_once './app/views/clients.view.php';
class ClientsController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ClientsModel();
        $this->view = new ClientsView();
    }

    public function showClients() {
        // obtengo los viajes del model
        AuthHelper::init();
        $clientes = $this->model->getClients();
        //los muestro con el view
        $this->view->showClients($clientes);
    }
    public function showDetailsClients($id_clients){
        $detailsClients = $this->model->getDetailsById($id_clients);
        $this->view->showDetailsClients($detailsClients);
    }
    public function addCliente(){
        AuthHelper::verify();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
      

        $this->model->insertClient($nombre, $apellido, $edad);
        header('Location: ' . BASE_URL . 'clientes');
    }
    public function removeClient($id){
        AuthHelper::verify();
        $this->model->deleteClient($id);
        header('Location: ' . BASE_URL. 'clientes');
    }

    public function editClients($id_clients) {
        AuthHelper::verify();
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->view->showEdit($id_clients);
        } else if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];  

            $this->model->updateClient($nombre, $apellido, $edad, $id_clients);
            header('Location: ' . BASE_URL. 'clientes');
        }
       
        
    }

}