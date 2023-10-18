<?php

class TravelsView {
    function showTravels($travels, $clients) {
        require './templates/travels_list.phtml';
    }
    function showDetails($travel){
        require './templates/travels_details.phtml';
    }
    function showError($error) {
        require './templates/error.phtml';
    }
    function showEdit($id_viajes, $clients){
        require './templates/modificarTravel.phtml';
    }
}

?>  