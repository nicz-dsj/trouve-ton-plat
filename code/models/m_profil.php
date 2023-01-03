<?php

require_once(PATH_MODELS.'Connexion.php');

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
    $query = $connexion->prepare('SELECT c.Nom FROM Categorie c JOIN PreferenceCategorie p ON c.IdCategorie = p.IdCategorie JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPrefIngredients($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT i.Nom FROM Ingredient i JOIN PreferenceIngredient p ON i.IdIngredient = p.IdIngredient JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsAjoutes($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}