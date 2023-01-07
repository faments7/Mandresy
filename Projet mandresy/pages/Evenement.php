<?php
include ('../inc/Connexion.php');
include ('../inc/Fonction.php');

$tabDate = getAllDate($dbh);
$tabRegion = getAllRegion($dbh);
$tabVille = getAllVille($dbh);
$tabArtiste = getAllArtiste($dbh);
$tabEvenement = getAllEvenement($dbh);
$tabStatus = getAllStatus($dbh);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/Evenement.css">
    <script src="../assets/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap-grid.min.css">
    <title>&Eacute;venement</title>
</head>
<body>
    <header>
        <div id="navigation">
            <div id="nav_bar">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link active" aria-current="page" href="Evenement.php">&Eacute;venement</a>
                <a class="nav-link" href="Ville.php">Ville</a>
                <a class="nav-link" href="Artiste.php">Artiste</a>
            </nav>
            </div>
        </div>
    </header>
    <nav class="navigation_principale" >
        <div class="card text-center">
            <div class="card-header">
                <div class="slider" >
                    <div class="slide-track">
                    <?php for ($i=0; $i < count($tabRegion) ; $i++) { ?>
                        <!-- slide 1 -->
                        <div class="slide">
                            <button type="button" class="btn btn-secondary"><?php echo $tabRegion[$i]['nom']; ?></button>
                        </div>
                    <?php } ?> 
                    <?php for ($i=0; $i < count($tabRegion)-1 ; $i++) { ?>
                        <!-- doublon slide -->
                        <div class="slide">
                            <button type="button" class="btn btn-secondary"><?php echo $tabRegion[$i]['nom']; ?></button>
                        </div>
                    <?php } ?>  
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="InscriptionEvent.php">Ajouter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="container" class="container">
        <div id="villeChoisie" class="villechoisie">
            <table style="border: 1px solid black;">
                <tr style="border: 1px solid black;">
                    <td>nom ville</td>
                    <td>status</td>
                    <td>supprimer</td>
                    <td>modifier</td>
                </tr>
                <?php for ($i=0; $i < count($tabEvenement); $i++) { 
                        for ($j=0; $j < count($tabVille); $j++) { 
                            if ($tabVille[$j]['idville'] == $tabEvenement[$i]['idville']) { ?>
                            <tr style="border: 1px solid black;" >
                                <td> <?php echo $tabVille[$j]['nomTown']; ?> </td>
                                <?php
                                    for ($k=0; $k < count($tabStatus) ; $k++) { 
                                    if ($tabStatus[$k]['idstatus'] == $tabEvenement[$i]['idstatue']) { ?>
                                    <td> <?php echo $tabStatus[$k]['nomStatus'] ?></td>
                                <?php } } ?>
                                <td> <a href="../inc/traitement/SupprimerEvent.php?idevenement=<?php echo $tabEvenement[$i]['idevenement'] ?>">Suprimer</a> </td>
                                <td> <a href="UpdateEvent.php?anciennomVille=<?php echo $tabVille[$j]['nomTown']; ?>&observation=<?php echo $tabEvenement[$i]['observation'] ?>">Modifier</a> </td>
                                <td> <a href="../inc/traitement/Confirmation.php?idevenement=<?php echo $tabEvenement[$i]['idevenement'] ?>">Confirmer</a></td>
                            </tr>
                            <?php }
                        } ?>
                <?php } ?> 
            </table>
        </div>    
    </div>
</body>
</html>