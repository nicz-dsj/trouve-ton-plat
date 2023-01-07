<?php

// Charge le fichier de connexion à la base de données
require_once(PATH_MODELS.'Connexion.php');

/**
 * Récupère les données d'un plat à partir de son ID
 * 
 * @param int $id L'ID du plat
 * @return array Les données du plat
 */
function getPlat($id){
    // Récupère l'instance de connexion à la base de données
    $connexion = Connexion::getInstance()->getBdd();
    
    // Prépare la requête SQL
    $query = $connexion->prepare('SELECT * FROM Plat WHERE IdPlat = ?');
    
    // Exécute la requête en passant l'ID du plat en paramètre
    $query->execute(array($id));
    
    // Récupère les résultats sous forme de tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // Ferme le curseur de la requête
    $query->closeCursor();
    
    // Retourne les résultats
    return $result;
}

/**
 * Récupère les données d'un utilisateur à partir de son ID
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les données de l'utilisateur
 */
function getUtilisateur($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les données d'une catégorie à partir de son ID
 * 
 * @param int $id L'ID de la catégorie
 * @return array Les données de la catégorie
 */
function getCategorie($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Categorie WHERE idCategorie = ?');
    $query = $connexion->prepare('SELECT * FROM Categorie WHERE idCategorie = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Ajoute dans la base le plat en favori
 * 
 * @param int $id L'ID de l'utilisateur
 * @param int $id L'ID du plat
 */
function addFavoris($id_utilisateur, $id_plat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('INSERT INTO Favoris VALUES(?,?)');
    $query->execute(array($id_plat, $id_utilisateur));
    $query->closeCursor();
}

/**
 * Supprime dans la base le plat en favori
 * 
 * @param int $id L'ID de l'utilisateur
 * @param int $id L'ID du plat
 */
function removeFavoris($id_utilisateur, $id_plat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM Favoris WHERE IdPlat = ? AND IdUtilisateur = ?');
    $query->execute(array($id_plat, $id_utilisateur));
    $query->closeCursor();
}


function checkFavoris($id_utilisateur, $id_plat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Favoris WHERE IdPlat = ? AND IdUtilisateur = ?');
    $query->execute(array($id_plat, $id_utilisateur));
    $rows = $query->rowCount();
    $query->closeCursor();
    if($rows > 0){
        return true;
    }
    else{
        return false;
    }
}