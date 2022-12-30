<?php
include ('../inc/Connexion.php');
include ('../inc/Fonction.php');

$tabRegion = getAllRegion($dbh);
$tabVille = getAllVille($dbh);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/Ville.css">
    <script src="../assets/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap-grid.min.css">
    <title>Mandresy & Ville</title>
</head>
<body>
    <header>
        <div id="navigation">
            <div id="nav_bar">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" href="Evenement.php">&Eacute;venement</a>
                <a class="nav-link active" aria-current="page" href="Ville.php">Ville</a>
                <a class="nav-link" href="#">Artiste</a>
            </nav>
            </div>
        </div>
    </header>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="nouvelle_ville" aria-current="true" href="#" onclick="showNewTown();">Nouvelle ville</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="toute_les_villes" href="#" onclick="showAllTown();">Toutes les villes</a>
            </li>
        </div>
    </div>
    <div class="card-body" id="new_town_card">
        <h5 class="card-title">Entrer la nouvelle ville</h5>
        <div class="row justify-content-around">
            <div class="col-5" id="ville_avec_region">
                <form action="../inc/TraitementVille.php" method="get">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nomVille" placeholder="Nouvelle ville">
                    </div> 
                    <div class="form-floating mb-3">
                        <select class="form-control" name="new_region">
                            <?php for ($i=0; $i < count($tabRegion) ; $i++) { ?>
                                <option selected><?php echo $tabRegion[$i]['nom']; ?></option>
                            <?php } ?> 
                        </select>
                    </div> 
                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Valider">
                    </div>
                </form>
            </div>
            <div class="col-5" id="ville_sans_region">
                <form action="../inc/TraitementVille.php" method="get">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nomVille" placeholder="Nouvelle ville">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="new_region" placeholder="Nouvelle region">
                    </div>
                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body" id="all_towns" style="display: none;">
        <div class="col-sm-3 " id="container" >
        <?php for ($i=0; $i < count($tabRegion) ; $i++) { ?>
            <h1><?php echo $tabRegion[$i]['nom']; ?></h1>
                <?php for ($j=0; $j < count($tabVille) ; $j++) { ?> 
                <?php if ($tabVille[$i]['idregion'] == $tabRegion[$i]['idregion']) { ?>
                    <h5><?php echo $tabVille[$i]['nomTown'] ?></h5>
                <?php } ?>
            </div>
        <?php } 
        } ?>
        <!-- <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> -->
    </div>
</body>
</html>
<script>
    function showAllTown() {
        document.getElementById('new_town_card').style.display = "none";
        document.getElementById('all_towns').style.display = "block";
        document.getElementById('nouvelle_ville').className = "nav-link";
        document.getElementById('toute_les_villes').className = "nav-link active";
    }

    function showNewTown() {
        document.getElementById('new_town_card').style.display = "block";
        document.getElementById('all_towns').style.display = "none";
        document.getElementById('nouvelle_ville').className = "nav-link active";
        document.getElementById('toute_les_villes').className = "nav-link";
    }
</script>