<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php
    $nomTown = $_GET['nomTown'];

    deleteVille($dbh,$nomTown);
    header("location: ../../pages/Ville.php");
?>