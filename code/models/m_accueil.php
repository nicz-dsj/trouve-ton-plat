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