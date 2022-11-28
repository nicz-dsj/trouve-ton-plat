<?php

require_once(PATH_MODELS.'Connexion.php');

function checkPseudo($nouvPseudo){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT pseudoUtilisateur FROM Utilisateur WHERE pseudoUtilisateur=?');
  $query->execute(array($nouvPseudo,));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function checkmail($nouvMail){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT mail FROM Utilisateur WHERE mail=?');
  $query->execute(array($nouvMail,));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function getMaxId(){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT MAX(idUtilisateur) FROM Utilisateur');
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result["MAX(idUtilisateur)"];
}

function addUser($id,$pseudo,$date,$mail,$pwd,$desc)
{
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Utilisateur VALUES (?, ?, ?, ?, ?, ?, 0)');
  var_dump(array($id,$pseudo,$date,$mail,$pwd,$desc));
  $query->execute(array($id,$pseudo,$date,$mail,$pwd,$desc));
  $query->closeCursor();
}
