<?php
include ('../inc/Connexion.php');
include ('../inc/Fonction.php');

$tagtab = getAllTag($dbh);
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
    <link rel="stylesheet" href="../assets/css/Artiste.css">
    <title>Artiste</title>
</head>
<body>
    <header>
        <div id="navigation">
            <div id="nav_bar">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" href="Evenement.php">&Eacute;venement</a>
                <a class="nav-link" href="Ville.php">Ville</a>
                <a class="nav-link active" aria-current="page" href="Artiste.php">Artiste</a>
            </nav>
            </div>
        </div>
    </header>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="nouvelle_artiste" aria-current="true" href="#" onclick="showNewArtiste();">Nouvelle artiste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="toute_les_artistes" href="#" onclick="showAllArtiste();">Toutes les artistes</a>
            </li>
        </div>
        <div class="card-body" id="new_artiste_card">
            <h5 class="card-title">Entrer la nouvelle artiste</h5>
            <div class="row justify-content-around">
                <div class="col-5" id="ville_avec_region">
                    <form action="../inc/traitement/AjouterArtiste.php" method="get">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nomArtiste" placeholder="Nom de l'artiste" required>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="typeArtiste" placeholder="Type d'artiste" required>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="contactArtiste" placeholder="contact" required>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="facebookArtiste" placeholder="Facebook" required>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tagArtiste" placeholder="Nouvelle Tag">
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control-file" id="floatingInput" accept="image/png, image/jpeg" name="photoArtiste" required>
                        </div> 
                        <div class="radio">
                            <?php for ($i=0; $i < count($tagtab) ; $i++) { ?>
                                <input type="radio" class="radio__input" id="tagradio" name="tagArtiste">
                                <label class="radio__label" for="tagArtiste"><?php echo $tagtab[$i]['nomTag'] ?></label>
                            <?php } ?>
                        </div> 
                        <div class="row justify-content-center">
                            <input type="submit" class="btn btn-primary" value="Valider">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body" id="all_artiste" style="display: none;">
            <?php for ($i=0; $i < count($tabArtiste) ; $i++) { ?>
                <div class="row justify-content-center">
                        <h5><?php echo $tabArtiste[$i]['nomArtiste'] ?></h5>
                    </div>
                    <div class="row justify-content-center">
                        <a href="../inc/traitement/SupprimerArtiste.php?nomArtiste=<?php echo $tabArtiste[$i]['nomArtiste'] ?>">Suprimer</a>
                    </div>
            <?php } ?>
        </div>
    </div>
    </div>
</body>
</html>
<script>
    function showAllArtiste() {
        document.getElementById('new_artiste_card').style.display = "none";
        document.getElementById('all_artiste').style.display = "block";
        document.getElementById('nouvelle_artiste').className = "nav-link";
        document.getElementById('toute_les_artistes').className = "nav-link active";
    }

    function showNewArtiste() {
        document.getElementById('new_artiste_card').style.display = "block";
        document.getElementById('all_artiste').style.display = "none";
        document.getElementById('nouvelle_artiste').className = "nav-link active";
        document.getElementById('toute_les_artistes').className = "nav-link";
    }
</script>