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

function getPlatsAjoutes($nom_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.pseudoUtilisateur = ?');
    $query->execute(array($nom_utilisateur));
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

function changeAvatar($nouv_avatar, $idUtilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET avatar = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_avatar, $idUtilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function updateLogin($nouv_nom_utilisateur, $id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET pseudoUtilisateur = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_nom_utilisateur, $id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function updateMail($nouv_mail, $id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET mail = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_mail, $id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function updatePwd($nouv_pwd, $id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET motDePasse = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_pwd, $id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function updateAbout($nouv_about, $id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET description = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_about, $id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function addPrefCategories($categories, $id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $n = 0;
    foreach($categories as $categorie){
        $query = $connexion->prepare('INSERT INTO PreferenceCategorie VALUES(?,?)');
        $query->execute(array($id_utilisateur, $categorie));
        $n++;
    }
    $query->closeCursor();
    return $n;
}

function deleteAllPrefCategories($id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM PreferenceCategorie WHERE IdUtilisateur = ?');
    $query->execute(array($id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function addPrefIngredients($ingredients, $id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $n = 0;
    foreach($ingredients as $ingredient){
        $query = $connexion->prepare('INSERT INTO PreferenceIngredient VALUES(?,?)');
        $query->execute(array($id_utilisateur, $ingredient));
        $n++;
    }
    $query->closeCursor();
    return $n;
}

function deleteAllPrefIngredients($id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM PreferenceIngredient WHERE IdUtilisateur = ?');
    $query->execute(array($id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}

function deleteUser($id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}