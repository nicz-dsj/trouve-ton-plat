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

function deleteUtilisateur($id){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}