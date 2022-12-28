<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <title>&Eacute;venement</title>
</head>
<body>
    <header>
        <div id="navigation">
            <div id="nav_bar">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Evenement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ville</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Artiste</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="nouvelle_ville" aria-current="true" href="#">Nouvelle ville</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="toute_les_villes" href="#" onclick="showAllTown();">Toutes les villes</a>
        </li>
    </div>
    <div class="card-body" id="new_town_card">
        <h5 class="card-title">Entrer la nouvelle ville</h5>
        <div class="row justify-content-around">
            <div class="col-5" id="ville_avec_region">
                <form action="#">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Entrer la nouvelle ville </label>
                    </div>
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected>Analamanga</option>
                            <option value="1">Itasy</option>
                            <option value="2">Boeny</option>
                            <option value="3">Vakinakaratra</option>
                        </select>
                    </div>
                </form>
                </div>
                <div class="col-5" id="ville_sans_region">
                    One of two columns
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
        document.getElementById('new_town_card').style.display = none;
        document.getElementById('all_towns').style.display = block;
        document.getElementById('nouvelle_ville').className = "nav-link";
        document.getElementById('toute_les_villes').className = "nav-link active";
    }

</script>