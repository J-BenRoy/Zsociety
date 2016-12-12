<meta charset="utf-8">
<?php
include'include/haut.inc.php';
$lastid = $conn->lastInsertId();
$idpro = $_POST['lastid'];
echo $idpro;
$Otarif = new tarif('','','','');
$lacat = new categorie('','','');
//ajoute pour chaque categorie et chaque type de repas un tarif
$resa = $lacat->afficher_categorie($conn);
while($tabcat = $resa->fetch())
{
    $tn = "tn".$tabcat->idcat;
    $tf = "tf".$tabcat->idcat;
    $tn = $_POST[$tn];
    $tf = $_POST[$tf];

    $req = $Otarif -> ajouter_tarif($idpro,$tabcat->idcat,$tn,$tf,$conn);
}

?>
