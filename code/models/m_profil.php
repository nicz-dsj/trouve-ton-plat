<?php

require_once(PATH_MODELS.'Connexion.php');

function getUtilisateur($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPrefCategorie($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT c.Nom FROM Categorie c JOIN PreferenceCategorie p ON c.IdCategorie = p.IdCategorie JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPrefIngredients($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT i.Nom FROM Ingredient i JOIN PreferenceIngredient p ON i.IdIngredient = p.IdIngredient JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsFavoris($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Favoris f ON p.IdPlat = f.IdPlat WHERE f.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsAjoutes($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ? AND p.Ajoutee = 1');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getAchievementFromUser($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT idAchiev FROM Composer_achievement WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}
function getAchievementFromBd($idAchiev){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT nameAchiev, descriptionAchiev FROM Achievement WHERE idAchiev = ?');
    $query->execute(array($idAchiev));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}