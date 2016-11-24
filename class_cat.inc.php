<?php

class categorie {
	private $idcat;
	private $libcat;
    private $valide;
	public function categorie($id, $lib,$val) {
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
	public function ajout_categorie($lib,$conn) {
		$SQL = "INSERT INTO `categorie`(`idcat`, `libcat`, `valide`) VALUES (NULL,'$lib','1')";
		$resultat = $conn -> query ($SQL);
	}
	public function afficher_categorie($conn) {
		$SQL = "SELECT * FROM categorie";
        $resa = $conn->query($SQL);
		$resa->setFetchMode ( PDO::FETCH_OBJ );
		return $resa;
	}
	public function maj_categorie($idc,$libc,$conn) {
		$SQL="UPDATE categorie SET libcat='$libc' WHERE idcat= '$idc'";
        
		$resultat = $conn -> query ($SQL);
        $this->libcat = $libc;
	}
}















