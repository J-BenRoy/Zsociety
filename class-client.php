<?php
class client {
    function client{
        private $id;
        $this->bdd = new connexion('easy_pills');
    }

    function get_nom_cli($id) { 
        $sql=$this ->bdd->get_connex()->prepare("SELECT nomclients FROM clients");
        $sql->execute();
        
    }
}
?>
