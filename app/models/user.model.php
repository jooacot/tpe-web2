<?php
class UserModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=web_2_tpe;charset=utf8', 'root', '');
    }

        public function getByUsername ($username){
            $query= $this->db->prepare('SELECT * FROM users_login WHERE username = ?');
            $query->execute([$username]);
        
        return $query->fetch(PDO::FETCH_OBJ);
        }
    }



