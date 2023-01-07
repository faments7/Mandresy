<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php
    $nomArtiste = $_GET['nomArtiste'];

    deleteArtiste($dbh,$nomArtiste);
    header("location: ../../pages/Artiste.php");
?>