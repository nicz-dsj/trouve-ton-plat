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

function addPlat($idPlat, $idEvent, $idUtilisateur, $desc, $recette, $date, $img, $nomPlat, $idCategorie){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO PlatEvenement VALUES(?,?,?,?,?,?,?,?,?)");
    $query->execute(array($idPlat, $idEvent, $idUtilisateur, $desc, $recette, $date, $img, $nomPlat, $idCategorie));
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

function deletePlat($idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM PlatEvenement WHERE IdPlatEvent = ?");
    $query->execute(array($idPlat));
    $query = $connexion->prepare("DELETE FROM ComposerEvenement WHERE IdPlatEvent = ?");
    $query->execute(array($idPlat));
    $query = $connexion->prepare("DELETE FROM Vote WHERE IdPlatEvent = ?");
    $query->execute(array($idPlat));
    $query->closeCursor();
}

function getMaxIdPlat(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT MAX(IdPlatEvent) FROM PlatEvenement");
    $query->execute(array());
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

function addVote($idUtilisateur, $idPlat, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO Vote VALUES(?, ?, ?)");
    $query->execute(array($idUtilisateur, $idPlat, $idEvent));
    $query->closeCursor();
}

function updateVote($idUtilisateur, $idPlat, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("UPDATE Vote SET IdPlatEvent = ? WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idPlat, $idUtilisateur, $idEvent));
    $query->closeCursor();
}

function deleteVote($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM Vote WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idUtilisateur, $idEvent));
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

function ajoutAchievement($idUtilisateur,$idAchiev){
    // cette fonction ajoute un achievement a l'utilisateur qui a propose un plat
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('INSERT INTO Composer_achievement VALUES (?, ?)');
    $query->execute(array($idAchiev,$idUtilisateur));
    $query->closeCursor();
}
function checkAchievement($idUtilisateur, $idAchiev){
    $connexion = Connexion::getInstance()->getBdd();
    // regarde si l'utilisateur à deja l'achievement 1
    $query = $connexion->prepare('SELECT * FROM Composer_achievement WHERE IdUtilisateur=? AND IdAchiev=?');
    $query->execute(array($idUtilisateur, $idAchiev));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    // si result est vide alors l'utilisateur n'a pas encore de achievement
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}
  