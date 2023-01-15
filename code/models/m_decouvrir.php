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

function getPlats(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat ORDER BY DatePublication DESC');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatsMieuxNotes(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat p ORDER BY (SELECT ROUND(AVG(Note),1) as MoyenneArr FROM Note n WHERE n.IdPlat = p.IdPlat) DESC');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

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

require_once(PATH_MODELS.'Connexion.php');