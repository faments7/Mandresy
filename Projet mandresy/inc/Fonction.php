<?php include ('Connexion.php') ?>
<?php
    // Pour les villes 
    $nomTown = null;
    $newRegion = null;

    // Pour les Artistes
    $nomArtiste = null;
    $typeArtiste = null;
    $contactArtiste = null;
    $facebookArtiste = null;

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

    function deleteVille($dbh,$nomTown) {
        $allVille = getAllVille($dbh);
        for ($i=0; $i < count($allVille); $i++) { 
            if ($nomTown == $allVille[$i]['nomTown']) {
                $sqlville = "DELETE FROM ville WHERE nom = '$nomTown'";
                echo $sqlville;
                try {
                    $dbh->prepare($sqlville);
                    $dbh->exec($sqlville);
                } catch (PDOException $pe) {
                    echo $pe;
                }
            }
        }
    }

    function getAllTag($dbh) {
        $sqlTag = "SELECT * FROM tag";
        $alltag = array();
        try {
            $resultat = $dbh->query($sqlTag);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while ($ligne = $resultat->fetch()) {
            $idTag = $ligne->idtag;
            $nomTag = $ligne->nomtag;

            $alltag[$i]['idtag'] = $idTag;
            $alltag[$i]['nomTag'] = $nomTag;

            $i++;
        }
        return $alltag;
    }
    
    function inscription_new_artiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste) {
        $sqlArtiste = "INSERT INTO artiste (nom,typeartiste,contact,facebook) VALUES ('$nomArtiste','$typeArtiste',".$contactArtiste.",'$facebookArtiste')";
        echo $sqlArtiste;
        try {
            $dbh->prepare($sqlArtiste);
            $dbh->exec($sqlArtiste);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

    function getAllArtiste($dbh) {
        $sqlArtiste = "SELECT * FROM artiste";
        $allArtiste = array();
        try {
            $resultat = $dbh->query($sqlArtiste);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while ($ligne = $resultat->fetch()) {
            $photoArtiste = $ligne->photoart;
            $idArtiste = $ligne->idartiste;
            $nomArtiste = $ligne->nom;
            $typeArtiste = $ligne->typeartiste;
            $contactArtiste = $ligne->contact;
            $facebookArtiste = $ligne->facebook;

            $allArtiste[$i]['idArtiste'] = $idArtiste;
            $allArtiste[$i]['photoart'] = $photoArtiste;
            $allArtiste[$i]['nomArtiste'] = $nomArtiste;
            $allArtiste[$i]['typeArtiste'] = $typeArtiste;
            $allArtiste[$i]['contactArtiste'] = $contactArtiste;
            $allArtiste[$i]['facebookArtiste'] = $facebookArtiste;

            $i++;
        }
        return $allArtiste;
    }

    function deleteArtiste($dbh,$nomArtiste) {
        $allArtiste = getAllArtiste($dbh);
        for ($i=0; $i < count($allArtiste); $i++) { 
            if ($nomArtiste == $allArtiste[$i]['nomArtiste']) {
                $sqlArtiste = "DELETE FROM ville WHERE nom = '$nomArtiste'";
                echo $sqlArtiste;
                try {
                    $dbh->prepare($sqlArtiste);
                    $dbh->exec($sqlArtiste);
                } catch (PDOException $pe) {
                    echo $pe;
                }
            }
        }
    }

    function updateArtiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste) {

    }

    function getAllDate($dbh) {
        $sqlDate = "SELECT * FROM datePrevue ";
        $allDate = array();
        try {
            $resultat = $dbh->query($sqlDate);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while($ligne = $resultat->fetch()) {
            $idDate = $ligne->iddate;
            $datePrevue = $ligne->dateprevue;

            $allDate[$i]['iddate'] = $idDate;
            $allDate[$i]['dateprevue'] = $datePrevue;

            $i++;
        }
        return $allDate;
    }

    // Fonction pour les evenements
    function getIdDate($dbh,$datechoisie) {
        $allDate = getallDate($dbh);
        for ($i=0; $i < count($allDate); $i++) { 
            if ($datechoisie == $allDate[$i]['dateprevue']) {
                $idDatePrevue = $allDate[$i]['iddate'];
            } else {
                echo "Date ne faisant pas partie des dates de l'evenement";
            }
        }
        return $idDatePrevue;
    }

    function getIdVille($dbh,$nomTown) {
        $allVille = getAllVille($dbh);
        for ($i=0; $i < count($allVille); $i++) { 
            if ($nomTown == $allVille[$i]['nomTown']) {
                $idVilleChoisie = $allVille[$i]['idville'];
            } else {
                echo "La ville ne fait pas partie de l'evenement";
            }
        }
        return $idVilleChoisie;
    }

    function getIdArtiste($dbh,$artistechoisie) {
        $allArtiste = getAllArtiste($dbh);
        for ($i=0; $i < count($allArtiste); $i++) { 
            if ($artistechoisie == $allArtiste[$i]['nomArtiste']) {
                $idArtistechoisie = $allArtiste[$i]['idArtiste'];
            } else {
                echo "cette artiste ne participe pas a l'evenement ";
            }
        }
        return $idArtistechoisie;
    }

    function newEvenement($dbh,$dateChoisie,$villeChoisie,$artisteChoisie){
        $idDate = getIdDate($dbh,$dateChoisie);
        $idVille = getIdVille($dbh,$villeChoisie);
        $idArtiste = getIdArtiste($dbh,$artisteChoisie);

        $sqlEvent = "INSERT INTO evenement (iddate,idville,idartiste,idstatue) VALUES (".$idDate.",".$idVille.",".$idArtiste.",'0');";
        echo $sqlEvent;
        try {
            $dbh->prepare($sqlEvent);
            $dbh->exec($sqlEvent);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

    function getAllEvenement($dbh) {
        $sqlEvent = "SELECT * FROM evenement";
        $allEvenement = array();

        return $allEvenement;
    }

    function changeValidation($dbh,$idEvenement) {
        $allEvenement = getAllEvenement($dbh);
        for ($i=0; $i < count($allEvenement); $i++) { 
            if ($idEvenement == $allEvenement[$i]['idevenement']) {
                $idEventchoisie = $idEvenement;
            }
        }
        $sqlChange = "UPDATE evenement SET idstatus = '1' WHERE idevenement = ".$idEventchoisie."";
        try {
            $dbh->prepare($sqlChange);
            $dbh->exec($sqlChange);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

    function deleteEvenement($dbh,$idEvenement) {
        $allEvenement = getAllEvenement($dbh);
        for ($i=0; $i < count($allEvenement); $i++) { 
            if ($idEvenement == $allEvenement[$i]['idevenement']) { 
                $sqldeleteEvent = "DELETE FROM evenement WHERE idevenement = '.$idEvenement.';";
            }
        }
        try {
            $dbh->prepare($sqldeleteEvent);
            $dbh->exec($sqldeleteEvent);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

    function updateEvenement($dbh,$idEvenement,$newTownSelected,$newArtisteSelected,$newDateSelected) {
        $allEvenement = getAllEvenement($dbh);
        for ($i=0; $i < count($allEvenement); $i++) { 
            if ($idEvenement == $allEvenement[$i]['idevenement']) {
                $idEventchoisie = $idEvenement; 
            }
        }
        $idnewDate = getIdDate($dbh,$newDateSelected);
        $idnewVille = getIdVille($dbh,$newTownSelected);
        $idnewArtiste = getIdArtiste($dbh,$newArtisteSelected);

        $sqlUpdateEvent = "UPDATE evenement SET iddate = '.$idnewDate.', idville = '.$idnewVille.', idartiste = '.$idnewArtiste.' WHERE idevenement = '.$idEventchoisie.'";
        try {
            $dbh->prepare($sqlUpdateEvent);
            $dbh->exec($sqlUpdateEvent);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

?>