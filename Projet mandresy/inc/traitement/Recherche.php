<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php
    $keywords = $_GET['keywords'];
    $valider = $_GET['validation'];

    // Recherche($dbh,$keywords,$valider);
    $afficher = "oui";
    header('location: ../../pages/Ville.php')
?>