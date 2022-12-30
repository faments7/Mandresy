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
                <a class="nav-link" href="#">Artiste</a>
            </nav>
            </div>
        </div>
    </header>
    <nav>
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
                <button type="button" class="btn btn-outline-primary">Primary</button>
            </div>
        </div>
    </div>
    </nav>
</body>
</html>