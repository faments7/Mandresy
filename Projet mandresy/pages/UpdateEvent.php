<?php
include ('../inc/Connexion.php');
include ('../inc/Fonction.php');

$AncienNom = $_GET['anciennomVille'];
$AncienObservation = $_GET['observation'];

$tabdate = getAllDate($dbh);
$tabVille = getAllVille($dbh);
$tabArtiste = getAllArtiste($dbh);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap-grid.min.css">
    <title>Mandresy&Nouvelle evenement</title>
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
    <div class="card-body" id="new_artiste_card">
        <h5 class="card-title">Modifier l'évènement localiser à <?php echo $AncienNom ?> </h5>
            <div class="row justify-content-around">
                <div class="col-5" id="ville_avec_region">
                    <form action="../inc/traitement/AjouterEvent.php" method="get">
                        <div class="form-floating mb-3">
                            <select class="form-control" name="ville">
                                <?php for ($i=0; $i < count($tabVille) ; $i++) { ?>
                                    <option selected><?php echo $tabVille[$i]['nomTown']; ?></option>
                                <?php } ?> 
                            </select>
                        </div> 
                        <div class="form-floating mb-3">
                            <select class="form-control" name="artiste">
                                <?php for ($i=0; $i < count($tabArtiste) ; $i++) { ?>
                                    <option selected><?php echo $tabArtiste[$i]['nomArtiste']; ?></option>
                                <?php } ?> 
                            </select>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="observation" placeholder="<?php echo $AncienObservation ?>" required>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="date">
                                <?php for ($i=0; $i < count($tabdate) ; $i++) { ?>
                                    <option selected><?php echo $tabdate[$i]['dateprevue']; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" class="btn btn-primary" value="Valider">
                        </div> 
                    </form>
                </div>
            </div>
    </div>
</body>
</html>