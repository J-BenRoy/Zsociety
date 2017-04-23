<?php
include 'include/haut.inc.php';
$lacat = new categorie('','','');
$lecli = new typeclients('','','');
$leprod = new produits('','','');
?>
<!doctype html>
<html lang="en">
    <head>
        <style>
            td /* Toutes les cellules des tableaux... */
            {
                border: 1px solid white; /* auront une bordure de 1px */
                
            }
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
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/list_client_passage.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>
        <script>
            $(function() {

                $( "#datepicker1" ).datepicker({

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
        <script>
            $(function() {

                $( "#datepicker2" ).datepicker({

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
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="stats">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="glyphicon glyphicon-search"></i> Statistiques :</h3>
                        </div>
                        <form method="post" action="statistiques.php">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-1" for="name">Nom</label>  
                                        <div class="col-md-3">
                                            <input id="name" name="name" type="text"> 
                                        </div>
                                        <label class="col-md-1" for="prenom">Prenom</label> 
                                        <div class="col-md-3"> 
                                            <input id="prenom" name="prenom" type="text"> 
                                        </div>
                                        <label class="col-md-1" for="cat">Catégorie</label> 
                                        <div class="col-md-2"> 
                                            <select id="cat" name="cat">
                                                <option value="0">  </option>
                                                <?php
                                                //Afficha et modification des categorie
                                                $resa = $lacat->afficher_categorie($conn);
                                                while($tabcat = $resa->fetch())
                                                {
                                                ?>
                                                <option value="<?php echo $tabcat->idcat; ?>"> <?php echo $tabcat->libcat; ?></option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-1" for="datepicker1">Début</label>  
                                        <div class="col-md-3">
                                            <input id="datepicker1" name="datepicker1" type="text"> 
                                        </div>
                                        <label class="col-md-1" for="datepicker2">Fin</label> 
                                        <div class="col-md-3"> 
                                            <input id="datepicker2" name="datepicker2" type="text"> 
                                        </div>
                                        <label class="col-md-1" for="type">Type :</label> 
                                        <div class="col-md-2"> 
                                            <select id="type" name="type">
                                                <option value="0">  </option>
                                                <?php
                                                //Afficha et modification des categorie
                                                $resa = $lecli->affiche_typecli($conn);
                                                while($tabcli = $resa->fetch())
                                                {
                                                ?>
                                                <option value="<?php echo $tabcli->idtypeclients; ?>"> <?php echo $tabcli->libtypeclients; ?></option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">

                                            <div class="col-md-4 col-md-offset-1"> 
                                                <label class="radio-inline" for="radios">
                                                    <input type="radio" name="radios" id="radios" value="1" checked="checked">
                                                    Listing
                                                </label> 
                                                <label class="radio-inline" for="radios">
                                                    <input type="radio" name="radios" id="radios" value="2">
                                                    Chiffrage
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-offset-5">
                                            <input type="submit" name="valider" id="send" value="Valider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php

        if(isset ( $_POST ["valider"] ))
        {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12" >
                    <?php 

            $radio = $_POST['radios'];
            if ($radio == '1'){
                $SQL = "
    SELECT nomclients,prenomclients, daterepas, heurerepas, prix, libtyperepas
    FROM repas, clients, typerepas, typeclients, categorie 
    WHERE repas.idclients = clients.idclients 
    AND repas.idtyperepas = typerepas.idtyperepas 
    AND categorie.idcat = typeclients.idcat
    AND clients.idtypeclients = typeclients.idtypeclients
    ";
            } else {
                $SQL = "
    SELECT nomclients,prenomclients, ROUND(SUM(prix),2) as prix
    FROM repas, clients, typerepas, typeclients, categorie 
    WHERE repas.idclients = clients.idclients 
    AND repas.idtyperepas = typerepas.idtyperepas 
    AND categorie.idcat = typeclients.idcat
    AND clients.idtypeclients = typeclients.idtypeclients
    ";
            } 



            $nom = $_POST['name'];
            if ($nom == ""){

            } else {
                $RQ = " AND clients.nomclients = '$nom'";
                $SQL = $SQL.$RQ;
            }


            $prenom = $_POST['prenom'];
            if ($prenom == ""){

            } else {
                $RQ = " AND clients.prenomclients = '$prenom'";
                $SQL = $SQL.$RQ;
            }

            $cat = $_POST['cat'];
            if ($cat == "0"){

            } else {
                $RQ = " AND categorie.idcat = '$cat'";
                $SQL = $SQL.$RQ;
            }

            $type = $_POST['type'];
            if ($type == "0"){

            } else {
                $RQ = " AND typeclients.idtypeclients = '$type'";
                $SQL = $SQL.$RQ;
            }


            $DD = $_POST['datepicker1'];
            $DF = $_POST['datepicker2'];

            if ($DD == ""){

            } elseif ($DF == "") {
                $RQ = " AND repas.daterepas BETWEEN '$DD' AND NOW()";
                $SQL = $SQL.$RQ;
            } else {
                $RQ = " AND repas.daterepas BETWEEN '$DD' AND '$DF'";
                $SQL = $SQL.$RQ;
            }



            if ($radio == '1'){
                $resa = $conn->query($SQL);
                $resa->setFetchMode ( PDO::FETCH_OBJ );
                while($rq1 = $resa->fetch()){
                    ?> <table> <tr> <td>
                    <?php
                    echo $rq1->nomclients ?> </td><td> <?php echo $rq1->prenomclients ?> </td><td> <?php echo $rq1->daterepas ?> </td><td> <?php echo $rq1->heurerepas ?> </td><td> <?php echo $rq1->prix ?> </td><td> <?php echo $rq1->libtyperepas ?><br><?php ;
                    ?></tr></table>
                    <?php
                }
            }else {
                $RQ = " GROUP BY clients.idclients";
                $SQL = $SQL.$RQ;
                $resa = $conn->query($SQL);
                $resa->setFetchMode ( PDO::FETCH_OBJ );

                while($rq1 = $resa->fetch()){
                    echo $rq1->nomclients ?>, <?php echo $rq1->prenomclients ?> , <?php echo $rq1->prix ?><br><?php ;
                }
            }
        }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>