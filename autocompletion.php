<?php

include'haut.inc.php';

$keyword = '%'.$_POST['keyword'].'%';  // recupere la lettre saisie dans le champ texte en provenance de JS 

// Une vieille requete a la con, si tu lis tu comprendras 

$sql = "SELECT * FROM clients WHERE 1";
if(is_numeric($keyword)){
	$sql =$sql." AND nomclients = '$keyword'";
}
else{
	$sql =$sql." AND nomclients LIKE (:keyword) OR prenomclients LIKE (:keyword) ORDER BY nomclients";
}
$query = $conn->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	//  Juste l'affichage de la liste, tu as vu comment ca marche hier 
	$nomclients = str_replace($_POST['keyword'],$_POST['keyword'],'<img src="'.$rs['photo'].'" width="130" height="100">'.' '.$rs['prenomclients'].' '.$rs['nomclients'].'<br><br>');
	// Sélection
    echo '<li onclick="set_item(\''.str_replace("'", "\'",$rs['prenomclients'].' '.$rs['nomclients']).'\',\''.str_replace("'", "\'", $rs['idclients']).'\')">'.$nomclients.'</li>';
}
?>