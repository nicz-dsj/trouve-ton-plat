<?php

require_once(PATH_MODELS.'Connexion.php');

function getNbParticipants($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT COUNT(*) FROM PlatEvenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0]['COUNT(*)'];
}

function getEvent($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Evenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getCurrentEvents($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Evenement WHERE SYSDATE() BETWEEN DateDebut AND DateFin AND IdEvenement != ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getMaxEventId(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT MAX(IdEvenement) FROM Evenement WHERE SYSDATE() BETWEEN DateDebut AND DateFin");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0]['MAX(IdEvenement)'];
}

function getCategories(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Categorie");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getIngredients(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Ingredient");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getEventPlats($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM PlatEvenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function haveParticipation($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM PlatEvenement WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idUtilisateur, $idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    
    if(count($result) > 0){
        return true;
    }
    else{
        return false;
    }
}

function getPlat($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM PlatEvenement WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idUtilisateur, $idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function addPlat($idEvent, $idUtilisateur, $desc, $recette, $date, $img, $idPlat, $nomPlat, $idCategorie){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO PlatEvenement VALUES(?,?,?,?,?,?,0,?,?,?)");
    $query->execute(array($idEvent, $idUtilisateur, $desc, $recette, $date, $img, $idPlat, $nomPlat, $idCategorie));
    $query->closeCursor();
}

function updatePlat($idUtilisateur, $idEvent, $nomPlat, $desc, $recette, $categorie, $img){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("UPDATE PlatEvenement SET Nom = ?, Description = ?, Recette = ?, IdCategorie = ?, Img = ? WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($nomPlat, $desc, $recette, $categorie, $img, $idUtilisateur, $idEvent));
    $query->closeCursor();
}

function addIngredient($idPlat, $idIngredient, $quantite, $unite){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO ComposerEvenement VALUES(?, ?, ?, ?)");
    $query->execute(array($idIngredient, $idPlat, $quantite, $unite));
    $query->closeCursor();
}

function deleteIngredients($idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM ComposerEvenement WHERE IdPlatEvent = ?");
    $query->execute(array($idPlat));
    $query->closeCursor();
}

function getMaxIdPlat($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT MAX(IdPlatEvent) FROM PlatEvenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0]['MAX(IdPlatEvent)'];
}

function ajoutImg($img,$idPlat){
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $nomImg = $idPlat.'.'.$extension;
    $cheminDossier = "./assets/img/plats_events/" . $nomImg;
    move_uploaded_file($img['tmp_name'], $cheminDossier);
    return $nomImg;
}

function reecriture_recette($recette){
    // cette fonction reecrit la recette pour qu'elle soit plus lisible et qu'elle soit parsé pour la fiche plat
    $tab_final = array();
    $tab = array();
    $tab = explode("\r", $recette);
    //retire le premier element de $tab
    $recette_final = "ÉTAPE 1:\r".$tab[0]."\r";
    $tab = array_slice($tab, 1);
    //pour chaque parti du tableau on ajoute une partie spécifiant le numero de l'étape
    for ($i=0; $i < count($tab); $i++) {
      $tab_final[$i] = "\rÉTAPE ".($i+2)." : ".$tab[$i]."\r";
    }
    //on concatene les chaines de caractères du tableau
    for ($i=0; $i < count($tab_final); $i++) {
      $recette_final = $recette_final.$tab_final[$i];
    }
    // supprime le dernier retour à la ligne situé à la fin de la chaine de caractère
    $recette_final = substr($recette_final, 0, -1);
    return $recette_final;
}

function haveVote($idUtilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Vote WHERE IdUtilisateur = ?");
    $query->execute(array($idUtilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    
    if(count($result) > 0){
        return true;
    }
    else{
        return false;
    }
}

function addVote($idUtilisateur, $idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO Vote VALUES(?, ?)");
    $query->execute(array($idUtilisateur, $idPlat));
    $query->closeCursor();
}

function updateVote($idUtilisateur, $idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("UPDATE Vote SET IdPlatEvent = ? WHERE IdUtilisateur = ?");
    $query->execute(array($idPlat, $idUtilisateur));
    $query->closeCursor();
}

function deleteVote($idUtilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM Vote WHERE IdUtilisateur = ?");
    $query->execute(array($idUtilisateur));
    $query->closeCursor();
}

function getPlatVote($idUtilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT p.IdPlatEvent, p.Nom FROM PlatEvenement p JOIN Vote v ON p.IdPlatEvent = v.IdPlatEvent WHERE v.IdUtilisateur = ?");
    $query->execute(array($idUtilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getGagnant($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT u.idUtilisateur, u.pseudoUtilisateur FROM Utilisateur u JOIN Gagnant g ON u.idUtilisateur = g.IdUtilisateur WHERE g.IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}