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
 * @return array Les préférences de catégories d'un utilisateur
 */
function getPrefCategorie($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT c.IdCategorie, c.Nom FROM Categorie c JOIN PreferenceCategorie p ON c.IdCategorie = p.IdCategorie JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les préférences d'ingrédients d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les préférences d'ingrédients d'un utilisateur
 */
function getPrefIngredients($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT i.IdIngredient, i.Nom FROM Ingredient i JOIN PreferenceIngredient p ON i.IdIngredient = p.IdIngredient JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère tous les plats ajoutés du site en fonction de la date (décroissant)
 * 
 * @return array Tous les plats ajoutés du site
 */
function getPlats(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat WHERE Ajoutee=1 ORDER BY DatePublication DESC');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les plats les mieux notés du site
 * 
 * @return array Les plats les mieux notés du site
 */
function getPlatsMieuxNotes(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p WHERE p.Ajoutee=1 ORDER BY (SELECT ROUND(AVG(Note),1) as MoyenneArr FROM Note n WHERE n.IdPlat = p.IdPlat) DESC');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les plats appartenant à des catégorie(s)
 * 
 * @param array $categories[] Les catégories
 * @return array Les plats appartenant à des catégorie(s)
 */
function getPlatsCategorie($categories){
    if($categories){
        $connexion = Connexion::getInstance()->getBdd();
        $sql = 'SELECT * FROM Plat WHERE';
        for($i = 0; $i < count($categories); $i++){
            if($i == 0){
                $sql = $sql.' IdCategorie = '.$categories[$i]['IdCategorie'];
            }
            else{
                $sql = $sql.' OR IdCategorie = '.$categories[$i]['IdCategorie'];
            }
        }

        $sql = $sql.' ORDER BY DatePublication DESC';
        $query = $connexion->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
    else{
        return array();
    }
    
}

/**
 * Récupère les plats composés d'ingrédient(s)
 * 
 * @param array $ingredients[] Les ingrédients
 * @return array Les plats composés d'ingrédient(s)
 */
function getPlatsIngredients($ingredients){
    if($ingredients){
        $connexion = Connexion::getInstance()->getBdd();
        $sql = 'SELECT DISTINCT p.IdPlat, p.Nom FROM Plat p JOIN Composer c ON p.IdPlat = c.IdPlat WHERE';
        for($i = 0; $i < count($ingredients); $i++){
            if($i == 0){
                $sql = $sql.' c.IdIngredient = '.$ingredients[$i]['IdIngredient'];
            }
            else{
                $sql = $sql.' OR IdIngredient = '.$ingredients[$i]['IdIngredient'];
            }
        }
    
        $sql = $sql.' ORDER BY p.DatePublication DESC';
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
    else{
        return array();
    }
}