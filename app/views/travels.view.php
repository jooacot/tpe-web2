<?php

class TravelsView {
    function showTravels($travels) {
        require './templates/travels_list.phtml';
    }
    function showTravelsById($id_viajes) {
        require './templates/travels_list_by_id.phtml';
    } 
    function showDetails($id_viajes){
        require './templates/travels_details.phtml';
    }
    function showError($error) {
        require './templates/error.phtml';
    }
}

?>  