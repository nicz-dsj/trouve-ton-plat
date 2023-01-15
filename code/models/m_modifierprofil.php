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

function isUsername($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();

    if($result){
        return true;
    }
    else{
        return false;
    }
}

function isMail($mail){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE mail = ?');
    $query->execute(array($mail));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();

    if($result){
        return true;
    }
    else{
        return false;
    }
}

function getPrefCategorie($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT c.IdCategorie, c.Nom FROM Categorie c JOIN PreferenceCategorie p ON c.IdCategorie = p.IdCategorie JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPrefIngredients($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT i.IdIngredient, i.Nom FROM Ingredient i JOIN PreferenceIngredient p ON i.IdIngredient = p.IdIngredient JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsAjoutes($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getCategories(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Categorie');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();

    return $result;
}

function getIngredients(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Ingredient');
    $query->execute(array());
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();

    return $result;
}

function changeAvatar($nouv_avatar, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET avatar = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_avatar, $id));
    $query->closeCursor();
}

function updateLogin($nouv_nom_utilisateur, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET pseudoUtilisateur = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_nom_utilisateur, $id));
    $query->closeCursor();
}

function updateMail($nouv_mail, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET mail = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_mail, $id));
    $query->closeCursor();
}

function updatePwd($nouv_pwd, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET motDePasse = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_pwd, $id));
    $query->closeCursor();
}

function updateAbout($nouv_about, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET description = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_about, $id));
    $query->closeCursor();
}

function addPrefCategories($categories, $id){
    $connexion = Connexion::getInstance()->getBdd();
    foreach($categories as $categorie){
        $query = $connexion->prepare('INSERT INTO PreferenceCategorie VALUES(?,?)');
        $query->execute(array($id, $categorie));
    }
    $query->closeCursor();
}

function deleteAllPrefCategories($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM PreferenceCategorie WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
}

function addPrefIngredients($ingredients, $id){
    $connexion = Connexion::getInstance()->getBdd();
    foreach($ingredients as $ingredient){
        $query = $connexion->prepare('INSERT INTO PreferenceIngredient VALUES(?,?)');
        $query->execute(array($id, $ingredient));
    }
    $query->closeCursor();
}

function deleteAllPrefIngredients($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM PreferenceIngredient WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
}

function deleteUtilisateur($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
}