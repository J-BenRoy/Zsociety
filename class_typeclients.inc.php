<?php
class typeclients{
	
	private $idtypeclients;
	private $libtypeclients;
	private $idcat;
	
	public function typeclients($idtc,$libtc,$idc){
		$this -> idtypeclients = $idtc;
		$this -> libtypeclients = $libtc;
		$this -> idcat = $idc;
	}
	
	public function get_idtypeclients(){
		return $this -> idtypeclients;
	}
	
	public function get_libtypeclients(){
		return $this -> libtypeclients;
	}
	
	public function get_idcat(){
		return $this -> idcat;
	}
	
	public function set_idtypeclients($idtc){
		$this -> idtypeclients = $idtc;
	}
	
	public function set_libtypeclients($libtc){
		$this -> libtypeclients = $libtc;
	}
	
	public function set_idcat($idc){
		$this -> idcat = $idc;
	}
	
	public function affiche_tarif($conn){
		$resa = $conn->query ( "SELECT * FROM tarif WHERE valide=1" );
		$resa->setFetchMode ( PDO::FETCH_OBJ );
		return $resa;
	}
	
	
	
}











