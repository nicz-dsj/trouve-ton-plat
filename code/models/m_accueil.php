<?php

require_once(PATH_MODELS.'Connexion.php');

function test()
{
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT * FROM Utilisateur');
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function getNbPlat(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT COUNT(*) AS nbPlat FROM Plat');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlatJour(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat_jour');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function getPlat($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT * FROM Plat WHERE IdPlat = ?');
    $query->execute(array($id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

function updatePlatJour($id, $date, $newdate, $newid){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('UPDATE Plat_jour SET IdPlat = ?,DateJ = ? WHERE IdPlat = ? AND DateJ = ?');
    $query->execute(array($newid, $newdate, $id, $date));
    $query->closeCursor();
}

function getFavMax(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT IdPlat, COUNT(*) as count FROM Favoris GROUP BY IdPlat ORDER BY count DESC LIMIT 1');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}