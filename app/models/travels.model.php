<?php

class TravelsModel {
    private $db;

    function __construct()  {
        $this->db = new PDO('mysql:host=localhost;dbname=web_2_tpe;charset=utf8', 'root', '');
    }

    function getTravels() {
        $query = $this->db->prepare('SELECT * FROM viajes');
        $query->execute();

        $travels = $query->fetchAll(PDO::FETCH_OBJ);

        return $travels;

        //travels es un arreglo con los viajes
    
    }
    

}

?>