<?php
$ville = $_GET['nomTown'];
$region = $_GET['region'];
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
    <title>Modifier ville</title>
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
        <form action="../inc/traitement/UpdateVille.php" method="get">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="nomVille" placeholder="<?php echo $ville ?>" required>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="region" placeholder="<?php echo $region ?>" required>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" value="Valider">
            </div>
        </form>
    </div>
</body>
</html>