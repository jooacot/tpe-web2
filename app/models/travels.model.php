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

    function getDetailsById($id_viajes){
        $query = $this->db->prepare('SELECT * FROM viajes where id_viajes = ?');
        $query->execute([$id_viajes]);

        $details = $query->fetchAll(PDO::FETCH_OBJ);
        return $details;
    }
    function insertTravel($destino, $precio, $fecha_ida, $fecha_vuelta){
        $query = $this->db->prepare('INSERT INTO viajes (destino, precio, fecha_ida, fecha_vuelta) VALUES (?, ?, ?, ?)');
        $query->execute([$destino, $precio, $fecha_ida, $fecha_vuelta]);

        return $this->db->lastInsertId();
    }
}

