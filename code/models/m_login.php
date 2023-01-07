<?php

require_once(PATH_MODELS.'Connexion.php');

function getPwd($login)
{
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT motDePasse FROM Utilisateur WHERE mail=? OR pseudoUtilisateur=?');
  $query->execute(array($login,$login));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function getUtilisateur($login){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT * FROM Utilisateur WHERE pseudoUtilisateur = ? OR mail = ?');
  $query->execute(array($login,$login));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}