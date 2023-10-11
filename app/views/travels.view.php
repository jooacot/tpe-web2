<?php

class TravelsView {
    function showTravels($travels) {
        require './templates/travels_list.phtml';
    }
    function showError($error) {
        require './templates/error.phtml';
    }
}

?>  