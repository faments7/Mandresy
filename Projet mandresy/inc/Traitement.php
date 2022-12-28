<?php include ('Connexion.php') ?>
<?php
function inscription_nouvelle_ville() {
    $nom = $_POST['nomVille'];
    $region = $_POST['region'];
    $sqlville= "INSERT INTO ville (nom) VALUES ('.$nom.');";
    $sqlregion= "INSERT INTO region (nom) VALUES ('.$region.');";

    $result1= $ ;
}

?>