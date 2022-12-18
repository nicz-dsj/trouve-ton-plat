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

function deleteUtilisateur($id_utilisateur){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('DELETE FROM Utilisateur WHERE IdUtilisateur = ?');
    $query->execute(array($id_utilisateur));
    $n = $query->rowCount();
    $query->closeCursor();
    return $n;
}