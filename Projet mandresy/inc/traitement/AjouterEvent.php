<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php
    $dateChoisie = $_GET['date'];
    $villeChoisie = $_GET['ville'];
    $observation = $_GET['observation'];
    $artisteChoisie = $_GET['artiste'];

    newEvenement($dbh,$dateChoisie,$villeChoisie,$observation,$artisteChoisie);
    header('location: ../../pages/Evenement.php');
?>