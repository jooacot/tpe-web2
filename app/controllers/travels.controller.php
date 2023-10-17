<?php

require_once './app/models/travels.model.php';
require_once './app/views/travels.view.php';

class TravelsController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TravelsModel();
        $this->view = new TravelsView();
    }

    public function showTravels() {
        // obtengo los viajes del model
        AuthHelper::init();
        $travels = $this->model->getTravels();
        //los muestro con el view
        $this->view->showTravels($travels);
    }
    public function showDetails($id_viajes){
        $detailsTravels = $this->model->getDetailsById($id_viajes);
        $this->view->showDetails($detailsTravels);
    }
    public function addTravel(){
        AuthHelper::verify();
        $destino = $_POST['destino'];
        $precio = $_POST['precio'];
        $fecha_ida = $_POST['fecha_ida'];
        $fecha_vuelta = $_POST['fecha_vuelta'];
        $id_usuario = $_SESSION['USER_ID'];

        $this->model->insertTravel($destino, $precio, $fecha_ida, $fecha_vuelta, $id_usuario);
        header('Location: ' . BASE_URL);
    }
    public function removeTravel($id_viajes){
        AuthHelper::verify();
        $this->model->deleteTravel($id_viajes);
        header('Location: ' . BASE_URL);
    }

    public function editTravel($id_viajes) {
        AuthHelper::verify();
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->view->showEdit($id_viajes);
        } else if($_SERVER["REQUEST_METHOD"] == "POST") {
            $destino = $_POST['destino'];
            $precio = $_POST['precio'];
            $fecha_ida = $_POST['fecha_ida'];
            $fecha_vuelta = $_POST['fecha_vuelta'];
            $id_usuario = $_SESSION['USER_ID'];  

            $this->model->updateTravel($destino, $precio, $fecha_ida, $fecha_vuelta, $id_usuario, $id_viajes);
            header('Location: ' . BASE_URL);
        }
       
        
    }

}
