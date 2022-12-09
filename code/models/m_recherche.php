<?php

require_once(PATH_MODELS.'Connexion.php');


function getIngredients(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Ingredient');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlats(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getAssoc($idPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Composer WHERE IdPlat = ?');
    $query->execute(array($idPlat));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getAssocSize(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT COUNT(*) FROM Plat');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function recherchePlat($recherche)
{
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare("SELECT * FROM Plat WHERE nom LIKE CONCAT('%', ?,'%')");
  $query->execute((array($recherche)));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
?>
