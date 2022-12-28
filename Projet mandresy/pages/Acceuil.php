<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="../assets/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="../assets/js/Ville.js"></script>
    <title>Mandresy & Ville</title>
</head>
<body>
    <header>
        <div id="navigation">
            <div id="nav_bar">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" href="#">&Eacute;venement</a>
                <a class="nav-link active" aria-current="page" href="#">Ville</a>
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
    <div class="card-body" id="new_town_card">
        <h5 class="card-title">Entrer la nouvelle ville</h5>
        <div class="row justify-content-around">
            <div class="col-5" id="ville_avec_region">
                <form action="../inc/Traitement.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="nomVille" placeholder="Nouvelle ville">
                    </div> 
                    <select class="form-select form-select-lg mb-3" name="region">
                        <option selected>Region</option>
                        <option value="1">Analamanga</option>
                        <option value="2">Itasy</option>
                        <option value="3">Boeny</option>
                    </select>
                </form>
                </div>
                <div class="col-5" id="ville_sans_region">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Nouvelle ville">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Nouvelle region">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="#" class="btn btn-primary">Valider</a>
            </div>
        </div>
    <div class="card-body" id="all_towns" style="display: none;">
        haloaaaaaaaaa
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