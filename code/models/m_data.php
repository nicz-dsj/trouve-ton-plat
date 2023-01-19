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
 * Récupère les évènements participés par un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les évènements participés par un utilisateur
 */
function getEventParticipes($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Evenement e JOIN PlatEvenement p ON e.IdEvenement = p.IdEvenement WHERE p.IdUtilisateur = ?');
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
function getSucces($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Achievement a JOIN Composer_achievement c ON a.idAchiev = c.idAchiev WHERE c.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}