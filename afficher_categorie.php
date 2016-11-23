<meta charset="utf-8">
<?php
include 'include/bdd.inc.php';
include 'include/class_cat.inc.php';
$lacat = new categorie('','','');
?>
<html>
    <head>
        <title>Safe and self</title>
    </head>
    <body>
        <form method="post" action="traitement_ajouter_categorie.php">
            <input type="text" name="cate"><br>
            <input type="submit" name="ajoucat" value="Ajouter">
        </form>
        
        
        <form method="post" action="traitement_modifier_categorie.php">
	<?php
        $resa = $lacat->afficher_categorie($conn);
		while($tabcat =$resa->fetch()) 
		{ ?>
            <?php
            $namelib = "libcat".$tabcat->idcat;
              echo $namelib;
            ?>
          
			<input type="text" name="<?php echo $namelib ?>" value="<?php echo $tabcat->libcat; ?>">
            <input type="hidden" name="idcat" value="<?php echo $tabcat->idcat; ?>"><br>
		<?php
		}?>
            <input type="submit" name="modifcate" value="Modifier">
        </form>
    </body>
</html>