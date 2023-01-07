<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php
    $idEvenement = $_GET['idevenement'];

    changeValidation($dbh,$idEvenement);
    header("location: ../../pages/Evenement.php");
?>