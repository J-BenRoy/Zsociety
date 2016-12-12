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
	
    public function ajouter_produit($idpro,$libpro,$conn){
		$this -> idproduits = $idpro;
		$this -> libproduits = $libpro;
		$SQL = "INSERT INTO `produits`(`idproduits`, `libproduits`, `valide`) VALUES ('$idpro','$libpro',1)";
		$resultat = $conn -> query($SQL);
	}
    
	
	public function affiche_produit($conn){
		$resa = $conn->query ( "SELECT * FROM produits WHERE valide=1 ORDER BY idproduits" );
		$resa->setFetchMode ( PDO::FETCH_OBJ );
		return $resa;
	}
	
	
	public function update_valide($idp,$conn){
		$resa = $conn->query("UPDATE produits SET valide='0' WHERE idproduits='$idp'");
        $this -> get_valide();
	}
    
    public function maj_produit($idp,$libp,$conn) {
		$SQL="UPDATE produits SET libproduits='$libp' WHERE idproduits= '$idp'";
        
		$resultat = $conn -> query ($SQL);
        $this->libproduits = $libp;
	}
}