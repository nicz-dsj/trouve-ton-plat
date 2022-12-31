<?php

function getUtilisateur($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPrefCategorie($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT c.IdCategorie, c.Nom FROM Categorie c JOIN PreferenceCategorie p ON c.IdCategorie = p.IdCategorie JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPrefIngredients($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT i.IdIngredient, i.Nom FROM Ingredient i JOIN PreferenceIngredient p ON i.IdIngredient = p.IdIngredient JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlats(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat ORDER BY DatePublication DESC');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsCategorie($categories){
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
    $query = $connexion->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsIngredients($ingredients){
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

require_once(PATH_MODELS.'Connexion.php');