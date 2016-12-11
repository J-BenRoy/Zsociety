<?php
include 'include/haut.inc.php';
?>
<!doctype html>
<html lang="en">
<head>
<style>
</style>
<meta charset="utf-8">
					<!--  JUSTE DU CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="css/bootstrap.css">

					<!--  j'me co a toutes mes pages js, yeahhh  -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/list_client_passage.js"></script>
<script type="text/javascript" src="js/verif_eleve_ajax.js"></script>

					<!--  Petit fonction pour le datepicker -->

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>

</head>



<body>

					<!--  Ici on met juste en place le formulaire pour recuperer la date et le type repas -->

<div class="container">
	<form method="post" id="dateform">
	<div class="col-md-2">
		<p>
			Date: <input type="text" id="datepicker" name="date">
		</p>
		</div><br><br><br>
		<div class="col-md-2">
		Service :
		<select id="selectbasic" name="typerepas" class="form-control">">
			<option value="matin">Matin</option>
			<option value="midi">Midi</option>
			<option value="soir">Soir</option>
		</select>
		</div> <br> <br> <br> <br>
		<div class="col-md-2">
		<input type="submit" name="valider" id="valider" value="Valider">
		</div>
		</p>
	</form>
	</div><br>
	
					<!--  Le if, la frero, il permet d'ouvrir la suite pour choisir le client, comme vous pouvez le constater on verifie 1. que la date n'est pas nul 2. et qu'il y a un resultat pour les deux données. -->
	
<?php
if (isset ( $_POST ['valider'] )and isset ( $_POST ['date'] ) and isset ( $_POST ['typerepas'] ) and ($_POST ['date'] != null) ) {
	?> 
	<div class="container">
		<div class="content">
			<form method="post">
			<div class="col-md-4">
				<div class="label_div">Client</div>
				<div class="input_container">
				
					<!--  si tu veux faire une liste d'autocompletion tu dois mettre onkeyup="autocomplet()"  (A verifier)  -->
						
					<input type="text" id="nomclient" onkeyup="autocomplet()"> 
					<input type="hidden" id="idclient" onkeyup="autocomplet()">
					
					<!--  Ici ca permet juste d'afficher la liste "ul"  -->
					
					<ul id="list_nomclient"></ul>
				</div>
				
				<!--  un vieux checkbox  -->
				
			<div id="repas">
				Cafe: <input type="checkbox" name="cafe" id="checkboxes-0" value="1"><br>
				Bol de riz: <input type="checkbox" name="bdr" id="checkboxes-0" value="1"><br>
				Coca: <input type="checkbox" name="coca" id="checkboxes-0" value="1"><br>
				Repas normal: <input type="checkbox" name="repas_normal" id="checkboxes-0" value="1"><br>
			</div>
			</div>
			</form>
		</div>
	</div>
	<div id="success"></div>
        <?php
}
?>
<script type="text/javascript">
jQuery('#repas').fadeOut();

/script>
</body>
</html>