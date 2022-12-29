<?php
require_once(PATH_MODELS.'Connexion.php');


function checkNomPlat($nouvPlat){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT Nom FROM Plat WHERE Nom=?');
    $query->execute(array($nouvPlat));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
  }
function addPlat($nomPlat,$descr,$cat,$recette)
{
    // recupere l'id de l'utilisateur
  $id = $_SESSION['id'];
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Plat VALUES (?, ?, ?, ?, ?, ?)');
  var_dump(array($id,$cat,$nomPlat,$descr,3,$recette,0));
  $query->closeCursor();
}
