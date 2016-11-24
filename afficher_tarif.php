<?php
include 'include/haut.inc.php';
$letarif = new produits ( '', '', '' );
?>
<html>
<head>
<title>Safe and self</title>
<style>
table {
	border-collapse: collapse;
}

td, th /* Mettre une bordure sur les td ET les th */ {
	border: 1px solid black;
}
</style>
</head>
<body>
	<FORM method="post">
		<SELECT name="prod" size="1">
        <?php
								$resa = $letarif->affiche_produit ( $conn );
								while ( $libp = $resa->fetch () ) {
									?>
                    <OPTION value="<?php echo $libp -> idproduits; ?>"><?php echo $libp->libproduits; ?>
                <?php } ?>
    
		
		</SELECT> <input type="submit" name="modiftarif" value="Valider">
	</FORM>
<?php
if (isset ( $_POST ['prod'] )) {
	$idp = $_POST ['prod'];
	$tabtarif = new tarif ( '', '', '', '' );
	?>
	<form method="post" action="traitement_modifier_tarif.php">
		<table>
		<tr>
			<th>Lib Tarif</th>
			<th>TN</th>
			<th>TF</th>
		</tr>
			<?php
	$resa = $tabtarif->select_tarif ( $conn, $idp );
	while ( $tab = $resa->fetch () ) {
		$tn = "tn".$tab->idcat.$tab->idproduits;
		$tf = "tf".$tab->idcat.$tab->idproduits;
        	?>
               <tr>
                   <td>
         				<?php echo $tab->libcat; ?>	
         		   </td>
                   <td>
                   		<input type="text" name="<?php echo $tn; ?>" value="<?php echo $tab->tarifN; ?>">
                   </td>
					<td>
						<input type="text" name="<?php echo $tf; ?>" value="<?php echo $tab->tarifF; ?>">
					</td>
			  </tr>
        
	<?php
	}
	?>
	
		</table>
		
		<input type="submit" name="modifcate" value="Modifier"><?php
}
?>