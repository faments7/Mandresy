<?php 
include ('Connexion.php');
include ('Fonction.php');
?>
<?php 
    $photoArt = $_GET['photoArt'];
    $nomArtiste = $_GET['nomArtiste'];
    $typeArtiste = $_GET['typeArtiste'];
    $contactArtiste = $_GET['contactArtiste'];
    $facebookArtiste = $_GET['facebookArtiste'];

    inscription_new_artiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste);
    header("location: ../pages/Artiste.php");
?>