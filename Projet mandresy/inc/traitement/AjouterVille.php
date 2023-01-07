<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php
    $nomTown = $_GET['nomVille'];
    $newRegion = $_GET['new_region'];

//  inscription_nouvelle_ville($dbh,$nomTown,$newRegion);
    inscription_new_ville($dbh,$nomTown,$newRegion);
    header("location: ../pages/Ville.php");
?>