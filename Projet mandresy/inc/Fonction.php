<?php include ('Connexion.php') ?>
<?php
    $nomTown = null;
    $newRegion = null;

    // function inscription_nouvelle_ville($dbh,$nomTown,$newRegion) {
    //     $sqlville= "INSERT INTO ville (nom) VALUES ('$nomTown');";
    //     $sqlregion= "INSERT INTO region (nom) VALUES ('$newRegion');";
    //     echo $sqlregion + "<br>", $sqlville + "<br>";
    //     try {
    //         $dbh->prepare($sqlregion);
    //         $dbh->prepare($sqlville);
    //         $dbh->exec($sqlregion);
    //         $dbh->exec($sqlville);
    //     } catch (PDOException $pe) {
    //         echo $pe;
    //     }
    // }
    
    function getAllRegion($dbh) {
        $sqlregion = "SELECT * FROM region";
        $allRegion = array();
        try {
            $resultat = $dbh->query($sqlregion);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while ($ligne = $resultat->fetch()) {
            $idRegion = $ligne->idregion;
            $region = $ligne->nom;
            $allRegion[$i]['idregion'] = $idRegion;
            $allRegion[$i]['nom'] = $region;
            $i++;
        }
        return $allRegion;
    }
    
    function inscription_new_ville($dbh,$nomTown,$newRegion){
        $allRegion = getAllRegion($dbh);
        for ($i=0; $i < count($allRegion)+1 ; $i++) { 
            if ($newRegion != $allRegion[$i]['nom']) {
                $sqlregion = "INSERT INTO region (nom) VALUES ('$newRegion')";
                $sqlville = "INSERT INTO ville (nom) VALUES ('$nomTown')";
                try {
                    $dbh->prepare($sqlregion);
                    $dbh->prepare($sqlregion);
                    $dbh->exec($sqlregion);
                    $dbh->exec($sqlville);
                    echo "nouvelle ville et nouvelle region";
                    break;
                } catch (PDOException $pe) {
                    echo $pe ;
                }
            } else {
                $sqlville = "INSERT INTO ville (nom,idregion) VALUES ('$nomTown',".$allRegion[$i]['idregion'].")";
                echo $sqlville;
                try {
                    $dbh->prepare($sqlville);
                    $dbh->exec($sqlville);
                    echo "nouvelle ville avec une region deja entrer";
                    break;
                } catch (PDOException $pe) {
                    echo $pe;
                }
            }
        }  
    }
    
    function getAllVille($dbh) {
        $sqlville = "SELECT * FROM ville";
        $allVille = array();
        try {
            $resultat = $dbh->query($sqlville);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while ($ligne = $resultat->fetch()) {
            $idRegion = $ligne->idregion;
            $idVille = $ligne->idville;
            $nomTown = $ligne->nom;

            $allVille[$i]['idregion'] = $idRegion;
            $allVille[$i]['idville'] = $idVille;
            $allVille[$i]['nomTown'] = $nomTown;

            $i++;
        }
        return $allVille;
    }   
?>