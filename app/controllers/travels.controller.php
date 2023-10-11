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
        $travels = $this->model->getTravels();
        //los muestro con el view
        $this->view->showTravels($travels);
    }
    public function showTravelsById($id_viajes) {
        $travel = $this->model->getTravelsById($id_viajes);
        $this->view->showTravelsById($travel);
    }

    public function showDetails($id_viajes){
        $detailsTravels = $this->model->getDetailsById($id_viajes);
        $this->view->showDetails($detailsTravels);
    }
}
