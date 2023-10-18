<?php

class TravelsView {
    function showTravels($travels, $clients) {
        require './templates/travels_list.phtml';
    }
    function showDetails($travels){
        require './templates/travels_details.phtml';
    }
    function showError($error) {
        require './templates/error.phtml';
    }
    function showEdit($id_viajes){
        require './templates/modificarTravel.phtml';
    }
}

?>  