<?php
include 'include/bdd.inc.php';
include 'include/class_cat.inc.php';
$catid = $_POST['id'];
$catlib = $_POST['lib'];
$lacat = new categorie('','');
while($catid)
{   
$lacat->maj_categorie($catid,$catlib,$conn);
}
?>