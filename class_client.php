<?php
class client {
    function client{
        private $id;
        $this->bdd = new connexion('safeself');
    }
    function get_nom_cli($id) { 
        $sql=$this ->bdd->get_connex()->prepare("SELECT nomclients FROM clients WHERE idclients='$id'");
        $sql->execute();
    }
	function modif_client($id,$ancien,$nouveau) {
		$sql=$this ->bdd->get_connex()->prepare("UPDATE clients SET nomclients='$nouveau' WHERE idclients='$id'");
	}
	function supprimer_client($id) {
		$sql=$this -> bdd->get_connex()->prepare("DELETE clients FROM nomclients WHERE idclients='$id'");
	}
}
?>

