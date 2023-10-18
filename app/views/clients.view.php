<?php

class ClientsView {
    function showClients($clients) {
        require './templates/clients_list.phtml';
    }
    function showDetailsClients($client){
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