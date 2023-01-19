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
 * Vérifie si le nom d'utilisateur est déjà utilisé
 * 
 * @param int $nom_utilisateur Le nom d'utilisateur
 * @return boolean true si le nom d'utilisateur est déjà utilisé, false sinon
 */
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

/**
 * Vérifie si l'adresse mail est déjà utilisée
 * 
 * @param int $mail L'adresse mail
 * @return boolean true si l'adresse mail est déjà utilisée, false sinon
 */
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

/**
 * Récupère les préférences de catégories d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les préférences de catégories de l'utilisateur
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
 * @return array Les préférences d'ingrédients de l'utilisateur
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
 * Récupère les plats ajoutés d'un utilisateur
 * 
 * @param int $id L'ID de l'utilisateur
 * @return array Les plats ajoutés de l'utilisateur
 */
function getPlatsAjoutes($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p JOIN Utilisateur u ON p.IdUtilisateur = u.IdUtilisateur WHERE u.IdUtilisateur = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/**
 * Récupère les catégories de plats
 * 
 * @return array Les catégories de plats
 */
function getCategories(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Categorie');
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
    $query = $connexion->prepare('SELECT * FROM Ingredient');
    $query->execute(array());
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();

    return $result;
}

/**
 * Change l'avatar d'un utilisateur
 * 
 * @param string Nom du nouvel avatar
 * @param int L'ID de l'utilisateur
 */
function changeAvatar($nouv_avatar, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET avatar = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_avatar, $id));
    $query->closeCursor();
}

/**
 * Change le nom d'utilisateur d'un utilisateur
 * 
 * @param string le nom d'utilisateur
 * @param int L'ID de l'utilisateur
 */
function updateLogin($nouv_nom_utilisateur, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET pseudoUtilisateur = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_nom_utilisateur, $id));
    $query->closeCursor();
}

/**
 * Change l'adresse mail d'un utilisateur
 * 
 * @param string l'adresse mail
 * @param int L'ID de l'utilisateur
 */
function updateMail($nouv_mail, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET mail = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_mail, $id));
    $query->closeCursor();
}

/**
 * Change le mot de passe de l'utilisateur
 * 
 * @param string le mot de passe
 * @param int L'ID de l'utilisateur
 */
function updatePwd($nouv_pwd, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET motDePasse = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_pwd, $id));
    $query->closeCursor();
}

/**
 * Change la description d'un utilisateur
 * 
 * @param string le mot de passe
 * @param int L'ID de l'utilisateur
 */
function updateAbout($nouv_about, $id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Utilisateur SET description = ? WHERE IdUtilisateur = ?');
    $query->execute(array($nouv_about, $id));
    $query->closeCursor();
}

/**
 * Ajoute des préférences de catégories à un utilisateur
 * 
 * @param array les préférences de catégorie
 * @param int L'ID de l'utilisateur
 */
function addPrefCategories($categories, $id){
    $connexion = Connexion::getInstance()->getBdd();
    foreach($categories as $categorie){
        $query = $connexion->prepare('INSERT INTO PreferenceCategorie VALUES(?,?)');
        $query->execute(array($id, $categorie));
    }
    $query->closeCursor();
}

/**
 * Supprime toutes les préférences de catégories à un utilisateur
 * 
 * @param int L'ID de l'utilisateur
 */
function deleteAllPrefCategories($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM PreferenceCategorie WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
}

/**
 * Ajoute des préférences d'ingrédients à un utilisateur
 * 
 * @param array les préférences d'ingrédients
 * @param int L'ID de l'utilisateur
 */
function addPrefIngredients($ingredients, $id){
    $connexion = Connexion::getInstance()->getBdd();
    foreach($ingredients as $ingredient){
        $query = $connexion->prepare('INSERT INTO PreferenceIngredient VALUES(?,?)');
        $query->execute(array($id, $ingredient));
    }
    $query->closeCursor();
}

/**
 * Supprime toutes les préférences d'ingrédients à un utilisateur
 * 
 * @param int L'ID de l'utilisateur
 */
function deleteAllPrefIngredients($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM PreferenceIngredient WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
}

/**
 * Supprime les données d'un utilisateur
 * 
 * @param int L'ID de l'utilisateur
 */
function deleteUtilisateur($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
}