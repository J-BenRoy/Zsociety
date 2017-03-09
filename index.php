<?php
$conn = new PDO('mysql:host=localhost;dbname=safeself;charset=utf8','root','');
include'include/class/class_cat.inc.php';
include'include/class/class_tarif.inc.php';
include'include/class/class_typeclients.inc.php';
include'include/class/class_produit.inc.php';
include'include/class/class_clients.inc.php';
include'include/class/class_repas.inc.php';
include'include/class/class_typerepa.inc.php';
include'include/class/class_typeprod.inc.php';
$typerepas = new typerepas('','');
?>
<!doctype html>
<html lang="en">
<head>
<style>
</style>
<meta charset="utf-8">
<!--  JUSTE DU CSS -->
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/local.css" />
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!--toutes mes pages js -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript"
	src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/list_client_passage.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>


<!--  Fonction Datepicker en français-->

<script>
$(function() {

$( "#datepicker" ).datepicker({

altField: "#datepicker",

closeText: 'Fermer',

prevText: 'Précédent',

nextText: 'Suivant',

currentText: 'Aujourd\'hui',

monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],

monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],

dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],

dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],

dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],

weekHeader: 'Sem.',

dateFormat: 'yy-mm-dd',

});

});
</script>

</head>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Safe &amp; Self</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php
                include'include/header.inc.php';
                ?>
            </div>
        </nav>

	<!--  Ici on met juste en place le formulaire pour recuperer la date et le type repas -->

	<div class="container">
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								  <h3 class="panel-title"><i class="glyphicon glyphicon-search"></i>Passage</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
								<form method="post" id="dateform">
									<div class="col-md-2">
										<p>
											Date: <input type="text" style="color:black;" id="datepicker" name="date" value="<?php if(isset($_POST['valider'])){echo $_POST['date'];} ?>"><br>
											<input type="hidden" name="time" id="heure" value="<?php echo date('H:i:s'); ?>">
										</p>
									</div>
									<br> <br> <br>
									<div class="col-md-5">
										<label>Repas</label>
                      <select class="form-control input-sm" name="typerepas" id="typerepas" style="color:black;">
                        <?php
												// Affichage des types de repas
                          $resa = $typerepas->afficher_typerepas($conn);
                            while ($tabtr =$resa->fetch())
                            { ?>
                              <option value="<?php echo $tabtr->idtyperepas; ?>"><?php echo $tabtr->libtyperepas; ?></option>
                    <?php  }
                    ?>
                      </select><br>
									</div>
									<br> <br> <br> <br>
									<div class="col-md-2">
										<input type="submit" style="color:black;" name="valider" id="valider_passage" value="Valider">
									</div>
									</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<br>

	<!--  Le if permet d'ouvrir la suite pour choisir le client, comme vous pouvez le constater on verifie 1. que la date n'est pas nul 2. et qu'il y a un resultat pour les deux donn�es. -->

<?php
if (isset ( $_POST ['valider'] ) and isset ( $_POST ['date'] ) and isset ( $_POST ['typerepas'] ) and ($_POST ['date'] != null)) {
	?>
	<div class="container">
		<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
								<h3 class="panel-title"><i class="glyphicon glyphicon-search"></i> clients</h3>
						</div>
						<div class="panel-body">

						<!--  si tu veux faire une liste d'autocompletion tu dois mettre onkeyup="autocomplet()"   -->

						<input type="text" id="nomclient" onkeyup="autocomplet()">
						<input type="hidden" id="idclient" name="idclient"onkeyup="autocomplet()">

						<!--  Ici ca permet juste d'afficher la liste "ul"  -->

						<ul id="list_nomclient" style="color:white;"></ul>

					<!--  checkbox  -->

					<div id="repas">
						<?php
						$leproduit = new produits ( '', '', '' );
						$resa = $leproduit->affiche_produit ( $conn );
						while ( $tabrepas = $resa->fetch () ) {
							?>
										<input id="checkbox" type="checkbox"
												name="produit" value="<?php echo $tabrepas -> libproduits;?>">
												<?php echo $tabrepas -> libproduits;?>
										<br>
										<?php
						}
						?>
						<input type="submit" name="valider" id="valider" value="Valider">
					</div>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
	<div id="success"></div>
        <?php
}
?>
</body>
</html>
<script>
	$("#valider").click(function(){
		var time = $("#heure").val();
		var datepick = jQuery("#datepicker").val();
		var typerep  = document.getElementById("typerepas").value;
		var idcli = document.getElementById("idclient").value;
		var produit = [];
		alert("INSERT INTO repas VALUES ('',"+datepick+ ","+time+", '6.50',"+idcli+","+typerep+", '15', '1')");
		$('#repas input:checked').each(function(){
            produit.push($(this).val());
		});
		//lib et nom en violet represente les variables juste en haut et en blanc correspond au $_POST[''] que l'on va récupérer dans le traitement
	$.post("traitement_passage.php", {datepick:dp, typerep:typerep, idcli:idcli,produit:prod, time:time}, function(data){
		console.log(data);
      })
	});
	
	
	
          
</script>


