<?php

class TravelsView {
    function showTravels($travels) {
        require './templates/travels_list.phtml';
    }
    function showDetails($travels){
        require './templates/travels_details.phtml';
    }
}

?>  