<?php

class TravelsView {
    function showTravels($travels) {
        $count = count($travels);

        require './templates/travels_list.phtml';
    }
}

?>  