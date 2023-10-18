<?php

class ClientsView {
    function showClients($clients) {
        require './templates/clients_list.phtml';
    }
    function showDetailsClients($clients){
        require './templates/clients_details.phtml';
    }
    function showError($error) {
        require './templates/error.phtml';
    }
    function showEdit($id){
        require './templates/modificarClient.phtml';
    }
}

?>  