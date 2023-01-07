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
    
    //Fonction pour les villes
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

    function getIdVille($dbh,$nomTown) {
        $allVille = getAllVille($dbh);
        for ($i=0; $i < count($allVille); $i++) { 
            if ($nomTown == $allVille[$i]['nomTown']) {
                $idVilleChoisie = $allVille[$i]['idville'];
            }
        }
        return $idVilleChoisie;
    }

    function updateVille($dbh,$nomVille,$nomTown) {
        $idVille = getIdVille($dbh,$nomVille);
        $allVille = getAllVille($dbh);
        for ($i=0; $i < count($allVille); $i++) { 
            if ($idVille == $allVille[$i]['idville']) {
                $idnewVille = $idVille;
            }
        }
        $sqlupdateVille = "UPDATE ville SET nom = '$nomTown' WHERE idville = '.$idnewVille.' ";
        try {
            $dbh->prepare($sqlupdateVille);
            $dbh->exec($sqlupdateVille);
        } catch (PDOException $pe) {
            echo $pe;

        }
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

    // Fonction por les artistes et tag
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
    
    function inscription_new_artiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste,$photoArt) {
        $sqlArtiste = "INSERT INTO artiste (nom,typeartiste,contact,facebook) VALUES ('$nomArtiste','$typeArtiste',".$contactArtiste.",'$facebookArtiste','$photoArt')";
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
            $allArtiste[$i]['nomArtiste'] = $ligne->nom;
            $allArtiste[$i]['photoart'] = $ligne->photoart;
            $allArtiste[$i]['idArtiste'] = $ligne->idartiste;
            $allArtiste[$i]['contactArtiste'] = $ligne->contact;
            $allArtiste[$i]['typeArtiste'] = $ligne->typeartiste;
            $allArtiste[$i]['facebookArtiste'] = $ligne->facebook;

            $i++;
        }
        return $allArtiste;
    }

    function getIdArtiste($dbh,$artistechoisie) {
        $allArtiste = getAllArtiste($dbh);
        for ($i=0; $i < count($allArtiste); $i++) { 
            if ($artistechoisie == $allArtiste[$i]['nomArtiste']) {
                $idArtistechoisie = $allArtiste[$i]['idArtiste'];
            }
        }
        return $idArtistechoisie;
    }

    function insertTag($dbh,$nomTag) {
        for ($i=0; $i < count($nomTag); $i++) { 
            $sqlTag = "INSERT INTO tag(nomtag) VALUES ('$nomTag[$i]['nomTag']') ; " ;
            try {
                $dbh->prepare($sqlTag);
                $dbh->exec($sqlTag);
            } catch (PDOException $pe) {
                echo $pe;
            }
        }
    }

    function getIdTag($dbh,$tagchoisie) {
        $allTag = getAllTag($dbh);
        for ($i=0; $i < count($allTag); $i++) { 
            if ($tagchoisie == $allTag[$i]['nomTag']) {
                $idTagchoisie = $allTag[$i]['idtag'];
            }
        }
        return $idTagchoisie;
    }

    function insertTagArtiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste,$photoArt,$nomTag) {
        $newTag = insertTag($dbh,$nomTag);
        $idnewArtiste = getIdArtiste($dbh,$nomArtiste);
        $newArtiste = inscription_new_artiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste,$photoArt);
        for ($i=0; $i < count($nomTag); $i++) { 
            $idTag = getIdTag($dbh,$nomTag[$i]);
            $sqlInsertTagArtiste = "INSERT INTO tagartiste (idartiste,idtag) VALUES ('.$idnewArtiste.','.$idTag[$i].'); ";
            try {
                $dbh->prepare($sqlInsertTagArtiste);
                $dbh->exec($sqlInsertTagArtiste);
            } catch (PDOException $pe) {
                echo $pe;
            }
        }
    }
    
    function updateArtiste($dbh,$nomArtiste,$typeArtiste,$contactArtiste,$facebookArtiste,$photoArtiste) {
        $allArtiste = getAllArtiste($dbh);
        for ($i=0; $i < count($allArtiste); $i++) { 
            if ($nomArtiste == $allArtiste[$i]['nom']) {
                $nomNewArtiste = $nomArtiste;
            }
        }
        $sqlupdateArtiste = "UPDATE artiste SET nom = '$nomNewArtiste',typeartiste = '$typeArtiste',contact = '$contactArtiste',facebook = '$facebookArtiste',photoart = '$photoArtiste'  WHERE nom = '$nomArtiste' ";
        try {
            $dbh->prepare($sqlupdateArtiste);
            $dbh->exec($sqlupdateArtiste);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

    function deleteArtiste($dbh,$nomArtiste) {
        $allArtiste = getAllArtiste($dbh);
        for ($i=0; $i < count($allArtiste); $i++) { 
            if ($nomArtiste == $allArtiste[$i]['nomArtiste']) {
                $sqlArtiste = "DELETE FROM artiste WHERE nom = '$nomArtiste'";
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

    //Fonction pour les dates
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

    function getIdDate($dbh,$datechoisie) {
        $allDate = getallDate($dbh);
        for ($i=0; $i < count($allDate); $i++) { 
            if ($datechoisie == $allDate[$i]['dateprevue']) {
                $idDatePrevue = $allDate[$i]['iddate'];
            }
        }
        return $idDatePrevue;
    }

    // Fonction pour les evenements

    function newEvenement($dbh,$dateChoisie,$villeChoisie,$observation,$artisteChoisie){
        $idDate = getIdDate($dbh,$dateChoisie);
        $idVille = getIdVille($dbh,$villeChoisie);
        $idArtiste = getIdArtiste($dbh,$artisteChoisie);

        $sqlEvent = "INSERT INTO evenement (iddate,idville,observation,idartiste,idstatue) VALUES (".$idDate.",".$idVille.",'$observation',".$idArtiste.",'1');";
        echo $sqlEvent;
        try {
            $dbh->prepare($sqlEvent);
            $dbh->exec($sqlEvent);
        } catch (PDOException $pe) {
            echo $pe;
        }
    }

    function getAllEvenement($dbh) {
        $sqlallEvent = "SELECT * FROM evenement";
        $allEvenement = array();
        try {
            $resultat= $dbh->query($sqlallEvent);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while ($ligne = $resultat->fetch()) {
            $allEvenement[$i]['idevenement'] = $ligne->idevenement;
            $allEvenement[$i]['idville'] = $ligne->idville;
            $allEvenement[$i]['observation'] = $ligne->observation;
            $allEvenement[$i]['idartiste'] = $ligne->idartiste;
            $allEvenement[$i]['idstatue'] = $ligne->idstatue;
            $allEvenement[$i]['iddate'] = $ligne->iddate;

            $i++;
        }
        return $allEvenement;
    }

    function getAllStatus($dbh) {
        $sql = "SELECT * FROM status";
        $allStatus = array();
        try {
            $resultat= $dbh->query($sql);
            $resultat->setFetchMode(PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe;
        }
        $i = 0;
        while ($ligne  = $resultat->fetch()) {
            $allStatus[$i]['idstatus'] = $ligne->idstatus;
            $allStatus[$i]['nomStatus'] = $ligne->nom;

            $i++;
        }
        return $allStatus;
    }

    function changeValidation($dbh,$idEvenement) {
        $allEvenement = getAllEvenement($dbh);
        for ($i=0; $i < count($allEvenement); $i++) { 
            if ($idEvenement == $allEvenement[$i]['idevenement']) {
                $idEventchoisie = $idEvenement;
            }
        }
        $sqlChange = "UPDATE evenement SET idstatue = '2' WHERE idevenement = ".$idEventchoisie."";
        echo $sqlChange;
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
                $sqldeleteEvent = "DELETE FROM evenement WHERE idevenement = '$idEvenement';";
                echo $sqldeleteEvent;
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

    function RechercheVille($dbh,$keywords,$valider) {
        $allVille = getAllVille($dbh);
        if (isset($valider) && !empty(trim($keywords))) {
            for ($i=0; $i < count($allVille) ; $i++) { 
                if ('%$keywords%' == $allVille[$i]['nomTown']) {
                    $sql = "SELECT nom FROM ville where nom LIKE '%$keywords%'";
                    try {
                        $resultat = $dbh->query($sql);
                        $resultat->setFetchMode(PDO::FETCH_OBJ);
                        $res = $resultat->fetchAll();
                    } catch (PDOException $pe) {
                        echo $pe;
                    }
                    
                }
            }
        }
    }

    function Recherche($dbh,$keywords,$valider){
        RechercheVille($dbh,$keywords,$valider);
    }

?>