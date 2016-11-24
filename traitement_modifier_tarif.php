<meta charset="utf-8">
<?php
include 'include/haut.inc.php';
$letarif = new tarif('','','','',$conn);
$resa = $letarif->affiche_tarif($conn);
while($tab =$resa->fetch()) 
{ 
	$tn = "tn".$tab->idcat.$tab->idproduits;
	$tf = "tf".$tab->idcat.$tab->idproduits;
    $tarn = $_POST[$tn];
    $tarf = $_POST[$tf];
    
    
    $letarif->maj_tarif($tab->idproduits,$tab->idcat,$tarf,$tarn,$conn);
}
?>