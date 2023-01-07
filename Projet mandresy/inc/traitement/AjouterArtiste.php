<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php 
    $photoArt = $_GET['photoArt'];
    $nomArtiste = $_GET['nomArtiste'];
    $photoArt = $_GET['photoArtiste'];
    $typeArtiste = $_GET['typeArtiste'];
    $contactArtiste = $_GET['contactArtiste'];
    $facebookArtiste = $_GET['facebookArtiste'];

    inscription_new_artiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste,$photoArt);
    header("location: ../pages/Artiste.php");
?>