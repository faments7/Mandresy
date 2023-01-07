<?php 
include ('../Connexion.php');
include ('../Fonction.php');
?>
<?php 
    $nomVille = $_GET['nomVille'];
    $region = $_GET['region'];

    updateVille($dbh,$nomVille,$region);
    // header("location: ../../pages/Ville.php");
?>
