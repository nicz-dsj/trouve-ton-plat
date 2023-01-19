<?php

require_once(PATH_MODELS.'Connexion.php');

/**
 * Récupère les données de l'évènement à partir de son ID
 * 
 * @param int $idEvent L'ID de l'évènement
 * @return array Les données de l'évènement
 */
function getEvent($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Evenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0];
}

/**
 * Récupère le nombre de participants d'un évènement
 * 
 * @param int $idEvent L'ID de l'évènement
 * @return array Les données de l'évènement
 */
function getNbParticipants($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT COUNT(*) FROM PlatEvenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0]['COUNT(*)'];
}

/**
 * Récupère les évènements en cours différents de l'évènement courant
 * 
 * @param int $idEvent L'ID de l'évènement courant
 * @return array Les évènements en cours différents de l'évènement courant
 */
function getCurrentEvents($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Evenement WHERE SYSDATE() BETWEEN DateDebut AND DateFin AND IdEvenement != ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère le dernier ID de l'évènement
 * 
 * @return int Le dernier ID de l'évènement
 */
function getMaxEventId(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT MAX(IdEvenement) FROM Evenement WHERE SYSDATE() BETWEEN DateDebut AND DateFin");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0]['MAX(IdEvenement)'];
}

/**
 * Récupère les catégories de plats
 * 
 * @return array Les catégories de plats
 */
function getCategories(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Categorie");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les ingrédients
 * 
 * @return array Les ingrédients
 */
function getIngredients(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Ingredient");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les plats participants un évènement
 * 
 * @param int $idEvent L'ID de l'évènement
 * @return array Les évènements en cours différents de l'évènement courant
 */
function getEventPlats($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM PlatEvenement WHERE IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Vérifie si un utilisateur participe à un évènement
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idEvent L'ID de l'évènement
 * @return boolean true si l'évènement participe à l'évènement en paramètre, false sinon
 */
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

/**
 * Récupère le plat d'un utilisateur participant à un évènement
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idEvent L'ID de l'évènement
 * @return array Le plat de l'utilisateur participant à un évènement
 */
function getPlat($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM PlatEvenement WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idUtilisateur, $idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0];
}

/**
 * Ajoute le plat d'un utilisateur participant à un évènement
 * 
 * @param int $idPlat L'ID du plat
 * @param int $idEvent L'ID de l'évènement
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param string $desc La description du plat
 * @param string $recette La recette du plat
 * @param string $date La date de publication du plat
 * @param string $img Le nom de l'image du plat
 * @param string $nomPlat Le nom du plat
 * @param int $idCategorie L'ID de la catégorie
 */
function addPlat($idPlat, $idEvent, $idUtilisateur, $desc, $recette, $date, $img, $nomPlat, $idCategorie){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO PlatEvenement VALUES(?,?,?,?,?,?,?,?,?)");
    $query->execute(array($idPlat, $idEvent, $idUtilisateur, $desc, $recette, $date, $img, $nomPlat, $idCategorie));
    $query->closeCursor();
}

/**
 * Modifie les informations du plat d'un utilisateur participant à un évènement
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idEvent L'ID de l'évènement
 * @param string $nomPlat Le nom du plat
 * @param string $desc La description du plat
 * @param string $recette La recette du plat
 * @param int $idCategorie L'ID de la catégorie
 * @param string $img Le nom de l'image du plat
 */
function updatePlat($idUtilisateur, $idEvent, $nomPlat, $desc, $recette, $idCategorie, $img){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("UPDATE PlatEvenement SET Nom = ?, Description = ?, Recette = ?, IdCategorie = ?, Img = ? WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($nomPlat, $desc, $recette, $idCategorie, $img, $idUtilisateur, $idEvent));
    $query->closeCursor();
}

/**
 * Ajoute un ingrédient composant un plat
 * 
 * @param int $idPlat L'ID du plat
 * @param int $idIngrédient L'ID de l'ingrédient
 * @param int $quantite La quantité
 * @param string $unite L'unité de mesure utilisée
 */
function addIngredient($idPlat, $idIngredient, $quantite, $unite){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO ComposerEvenement VALUES(?, ?, ?, ?)");
    $query->execute(array($idIngredient, $idPlat, $quantite, $unite));
    $query->closeCursor();
}

/**
 * Ajoute tous les ingrédients composant un plat
 * 
 * @param int $idPlat L'ID du plat
 */
function deleteIngredients($idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM ComposerEvenement WHERE IdPlatEvent = ?");
    $query->execute(array($idPlat));
    $query->closeCursor();
}

/**
 * Supprime le plat d'un utilisateur participant à un évènement
 * 
 * @param int $idPlat L'ID du plat
 */
function deletePlat($idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM PlatEvenement WHERE IdPlatEvent = ?");
    $query->execute(array($idPlat));
    $query->closeCursor();
}

/**
 * Récupère le dernier ID d'un plat
 * 
 * @return int Le dernier ID d'un plat
 */
function getMaxIdPlat(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT MAX(IdPlatEvent) FROM PlatEvenement");
    $query->execute(array());
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0]['MAX(IdPlatEvent)'];
}

/**
 * Permet d'ajouter une image dans les fichiers locaux du site et de générer un nouveau nom d'image
 * 
 * @param array $img Objet $_FILES['img'] contenant l'image
 * @param int L'ID d'un plat
 * @return string Le nouveau nom de l'image
 */
function ajoutImg($img,$idPlat){
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $nomImg = $idPlat.'.'.$extension;
    $cheminDossier = "./assets/img/plats_events/" . $nomImg;
    move_uploaded_file($img['tmp_name'], $cheminDossier);
    return $nomImg;
}

/**
 * Permet de réadapter une recette
 * 
 * @param string La recette
 * @return string La recette réadaptée
 */
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

/**
 * Vérifie si un utilisateur a voté pour un plat lors d'un évènement
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idUtilisateur L'ID de l'évènement
 * @return boolean true si l'utilisateur a voté pour un plat lors d'un évènement, false sinon
 */
function haveVote($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT * FROM Vote WHERE IdUtilisateur = ? AND IdEvenement = ?");
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

/**
 * Ajoute le vote d'un plat d'un utilisateur
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idPlat L'ID du plat
 * @param int $idEvent L'ID de l'évènement
 */
function addVote($idUtilisateur, $idPlat, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("INSERT INTO Vote VALUES(?, ?, ?)");
    $query->execute(array($idUtilisateur, $idPlat, $idEvent));
    $query->closeCursor();
}

/**
 * Mets à jour le vote d'un plat d'un utilisateur
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idPlat L'ID du plat
 * @param int $idEvent L'ID de l'évènement
 */
function updateVote($idUtilisateur, $idPlat, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("UPDATE Vote SET IdPlatEvent = ? WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idPlat, $idUtilisateur, $idEvent));
    $query->closeCursor();
}

/**
 * Supprime le vote d'un utilisateur
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idEvent L'ID de l'évènement
 */
function deleteVote($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("DELETE FROM Vote WHERE IdUtilisateur = ? AND IdEvenement = ?");
    $query->execute(array($idUtilisateur, $idEvent));
    $query->closeCursor();
}

/**
 * Récupère le plat auquel un utilisateur a voté au cours d'un évènement
 * 
 * @param int $idUtilisateur L'ID de l'utilisateur
 * @param int $idEvent L'ID de l'évènement
 * @return array Le plat auquel l'utilisateur a voté au cours d'un évènement
 */
function getPlatVote($idUtilisateur, $idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT p.IdPlatEvent, p.Nom FROM PlatEvenement p JOIN Vote v ON p.IdPlatEvent = v.IdPlatEvent WHERE v.IdUtilisateur = ? AND v.IdEvenement = ?");
    $query->execute(array($idUtilisateur, $idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0];
}

/**
 * Récupère le gagnant d'un évènement
 * 
 * @param int $idEvent L'ID de l'évènement
 * @return array Le gagnant d'un évènement
 */
function getGagnant($idEvent){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare("SELECT u.idUtilisateur, u.pseudoUtilisateur FROM Utilisateur u JOIN Gagnant g ON u.idUtilisateur = g.IdUtilisateur WHERE g.IdEvenement = ?");
    $query->execute(array($idEvent));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0];
}

/**
 * Ajoute un succès à un utilisateur
 * 
 * @param int $idEvent L'ID de l'évènement
 * @param int $idAchiev L'ID du succès
 */
function ajoutAchievement($idUtilisateur,$idAchiev){
    // cette fonction ajoute un achievement a l'utilisateur qui a propose un plat
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('INSERT INTO Composer_achievement VALUES (?, ?)');
    $query->execute(array($idAchiev,$idUtilisateur));
    $query->closeCursor();
}

/**
 * Vérifie si un utilisateur possède un succès
 * 
 * @param int $idUtilisateur l'ID de l'utilisateur
 * @param int $idAchiev L'ID du succès
 * @return boolean true si l'utilisateur possède le succès, false sinon
 */
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
  