<meta charset="utf-8">
<?php
include 'include/bdd.inc.php';
include 'include/class_cat.inc.php';
$lacat = new categorie('','',$conn);
$resa = $lacat->afficher_categorie($conn);
while($tabcat =$resa->fetch()) 
{ 
    $namelib = "libcat".$tabcat->idcat;
    echo $namelib;
    $lib = $_POST[$namelib];
    echo '   '.$lib;
    
    $lacat->maj_categorie($tabcat->idcat,$lib,$conn);
}
?>