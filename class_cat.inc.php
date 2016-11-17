<?php
class categorie {
	private $idcat;
	private $libcat;
	private $valide;
	public function categorie($id, $lib, $val) {
		$this->idcat = $id;
		$this->libcat = $lib;
		$this->valide = $val;
	}
	
	public function get_id_categorie() {
		return $this->idcat;
	}
	
	public function set_lib_categorie($lib) {
		$this->libcat = $lib;
	}
	
	public function get_lib_categorie() {
		return $this->libcat;
	}
	
	public function get_valide_categorie() {
		return $this->valide;
	}
	
	public function ajout_categorie($lib, $conn) {
		$SQL = "INSERT INTO `categorie`(`idcat`, `libcat`, `valide`) VALUES (NULL,'$lib',1)";
		$resultat = $conn->query ( $SQL );
	}
	
	public function afficher_categorie($conn) {
		$resa = $conn->query ( "SELECT * FROM categorie WHERE valide=1" );
		$resa->setFetchMode ( PDO::FETCH_OBJ );
		return $resa;
	}
	
	public function maj_categorie($idc, $libc, $conn) {
		$this->set_lib_categorie ( $libc );
		$SQL = "UPDATE categorie SET libcat=$libc WHERE idcat=$idc";
		$resultat = $conn->query ( $SQL );
	}
	
	public function update_valide($idc, $conn) {
		$resa = $conn->query ( "UPDATE categorie SET valide=0 WHERE idcat=$idc" );
		$resa->setFetchMode ( PDO::FETCH_OBJ );
	}
}















