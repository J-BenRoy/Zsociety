<?php
//Page permettant de saisir les tarifs
include 'include/haut.inc.php';
$addpro = $_POST['libpro'];
$lepro = new produits('','','');
$lacat = new categorie('','','');
$lepro->ajouter_produit('',$addpro,$conn);
$lastid = $conn->lastInsertId();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register - Dark Admin</title>

        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/local.css" />

        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <style>

            div {
                padding-bottom:20px;
            }

        </style>
    </head>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Safe &amp; Self</a>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="glyphicon glyphicon-search"></i>Attribuer les prix</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <form method="post" action="traitement_ajouter_tarif.php">
                                    <input type="hidden" name="lastid" value="<?php echo $lastid; ?>">
                                    <table>
                                        <tr>
                                            <th>Catégories</th>
                                            <th>Tarif Normal</th>
                                            <th>Tarif Fidélisé</th>
                                        </tr>
                                        <?php
                                        $resa = $lacat->afficher_categorie($conn);
                                        while($tabcat = $resa->fetch())
                                        {
                                          //Concatenation de tn et tf avec les ID des categories
                                            $tn = "tn".$tabcat->idcat;
                                            $tf = "tf".$tabcat->idcat;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $tabcat->libcat; ?>
                                            </td>
                                            <td>
                                                <input style="color:black;" type="text" name="<?php echo $tn; ?>">
                                            </td>
                                            <td>
                                                <input type="text" style="color:black;" name="<?php echo $tf; ?>">
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <input type="submit" value="Ajouter">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>
