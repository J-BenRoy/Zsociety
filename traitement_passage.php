<?php
include 'include/haut.inc.php';
$datepick = $_POST['dp'];
$time = $_POST['time'];
$typerep = $_POST['typerep'];
$idcli = $_POST['idcli'];
$SQL = "INSERT INTO repas VALUES ('', '2017-09-09', '15:15:24', '6.50', 1, 1, '15', '1')";
$resultat = $conn->query($SQL);
?>