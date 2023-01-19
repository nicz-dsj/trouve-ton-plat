<?php

require_once(PATH_MODELS.'Connexion.php');

/**
 * Récupère les données d'un utilisateur à partir de son ID
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les données de l'utilisateur
 */
function getUtilisateur($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result[0];
}

/**
 * Récupère les préférences de catégories d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les préférences de catégories de l'utilisateur
 */
function getPrefCategorie($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT c.Nom FROM Categorie c JOIN PreferenceCategorie p ON c.IdCategorie = p.IdCategorie JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les préférences d'ingrédients d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les préférences d'ingrédients de l'utilisateur
 */
function getPrefIngredients($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT i.Nom FROM Ingredient i JOIN PreferenceIngredient p ON i.IdIngredient = p.IdIngredient JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les plats favoris d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les plats favoris de l'utilisateur
 */
function getPlatsFavoris($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Favoris f ON p.IdPlat = f.IdPlat WHERE f.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les plats ajoutés d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les plats ajoutés de l'utilisateur
 */
function getPlatsAjoutes($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ? AND p.Ajoutee = 1');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les succès d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les succès de l'utilisateur
 */
function getAchievementFromUser($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT idAchiev FROM Composer_achievement WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les données d'un succès
 * 
 * @param int $idAchiev L'ID du succès
 * @return array Les données du succès
 */
function getAchievementFromBd($idAchiev){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT nameAchiev, descriptionAchiev FROM Achievement WHERE idAchiev = ?');
    $query->execute(array($idAchiev));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}