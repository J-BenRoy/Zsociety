<meta charset="utf-8">
<?php
include 'include/haut.inc.php';
$lacat = new categorie('','',$conn);
$resa = $lacat->afficher_categorie($conn);
while($tabcat =$resa->fetch()) 
{ 
    $namelib = "libcat".$tabcat->idcat;
    $lib = $_POST[$namelib];
    
    $lacat->maj_categorie($tabcat->idcat,$lib,$conn);
}
?>