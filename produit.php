<?php
    include'include/haut.inc.php';
    $leprod = new produits('','','');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe &amp; Self</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript"
    	src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/produit.js"></script>

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
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="glyphicon glyphicon-time"></i> ajouter un produit</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <form method="post" action="traitement/traitement_ajouter_produit.php">
                                        <label>Produit</label>
                                        <input type="text" style="color:black;" name="libpro">
                                        <input type="submit" style="color:black;" name="ajoutpro" value="Ajouter">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="glyphicon glyphicon-time"></i>Les produits</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <form method="post" style="color:black;" action="traitement/traitement_modifier_produit.php">
                                       <?php
                                       //Affichage et modification des produits
                                            $resa = $leprod->affiche_produit($conn);
		                                      while($tabpro =$resa->fetch())
		                                      { ?>
                                                <?php
                                                $namelib = "libpro".$tabpro->idproduits;
                                                ?>
			                                     <input type="text" name="<?php echo $namelib ?>" value="<?php echo $tabpro->libproduits; ?>">
                                                <input type="hidden" name="idcat" value="<?php echo $tabpro->idproduits; ?>"><br>
		                                      <?php
		                                      }?>
                                        <input type="submit" name="modifcate" value="Modifier">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="glyphicon glyphicon-time"></i>Supprimer un produit</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-5">

                                  <!-- Auto completion afin de pouvoir selectionner le produit à supprimer-->

                                    <form method="post" style="color:black;" action="traitement/traitement_supprimer_produit.php">
                                        <input type="text" id="libproduit" onkeyup="autocomplet()">
                                        <input type="hidden" id="idproduit" name="idproduit"onkeyup="autocomplet()">
                                        <ul id="list_produit" style="color:white;"></ul>
                                        <input type="submit" name="supprimer" value="Supprimer">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
