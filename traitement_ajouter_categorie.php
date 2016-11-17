<?php
include 'include/bdd.inc.php';
include 'include/class_cat.inc.php';
$addcate = $_POST['cate'];
$lacat = new categorie('','');
$lacat->ajout_categorie($addcate,$conn);
Header('Location:afficher_categorie.php');
?>