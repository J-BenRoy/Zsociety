<?php
class produits{
	
	private $idproduits;
	private $libproduits;
	private $valide;
	
	public function produit($idp,$libp,$v){
		$this -> idproduits = $idp;
		$this -> libproduits = $libp;
		$this -> valide = $v;
	}
	
	public function get_idproduit(){
		return $this -> idproduits;
	}
	
	public function get_libproduits(){
		return $this ->libproduits;
	}
	
	public function get_valide(){
		return $this -> valide;
	}
	
	public function set_libproduits($libp){
		$this -> libproduits = $libp;
	}
	
	public function ajouter_tarif($tf,$tn,$conn){
		$this -> tarifF($tf);
		$this -> tarifN($tn);
		$SQL = "INSERT INTO `tarif`(`idproduits`, `idcat`, `tarifN`, `tarifF`, `valide`) VALUES (NULL,NULL,'$tf','$tn',1)";
		$resultat = $conn -> query($SQL);
	}
	
	public function affiche_produit($conn){
		$resa = $conn->query ( "SELECT * FROM produits WHERE valide=1" );
		$resa->setFetchMode ( PDO::FETCH_OBJ );
		return $resa;
	}
	
	public function maj_tarif($idp,$idc,$tf,$tn,$conn){
		$this -> set_tarifF($tf);
		$this -> set_tarifN($tn);
		$SQL="UPDATE tarif SET tarifN=$libc WHERE idcat=$idc AND idproduit=$idp";
		$resultat = $conn -> query ($SQL);
	}
	
	public function update_valide($idp,$idcat,$conn){
		$resa = $conn->query("UPDATE tarif SET valide=0 WHERE idproduit=$idp AND idcat=$idc");
		$resa->setFetchMode ( PDO::FETCH_OBJ );
	}
}