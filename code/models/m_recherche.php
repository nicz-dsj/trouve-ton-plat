<?php

require_once(PATH_MODELS.'Connexion.php');


function recherchePlat($recherche)
{
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare("SELECT * FROM Plat WHERE nom = ?");
  $query->execute(array($recherche,));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}
?>
