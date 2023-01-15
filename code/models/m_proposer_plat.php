<?php
require_once(PATH_MODELS.'Connexion.php');


function checkNomPlat($nouvPlat){
   // cette fonction regarde si le plat mit en parametre existe deja dans la base de donnees
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT Nom FROM Plat WHERE Nom=?');
    $query->execute(array($nouvPlat));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
  }



function getMaxId(){
  // cette fonction recupere le dernier id de plat dans la base de donnees
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT MAX(IdPlat) FROM Plat');
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result["MAX(IdPlat)"];
  }

function addPlat($idPlat,$idUtilisateur,$nomPlat,$descr,$date,$cat,$recette, $nom_img){
  // cette fonction ajoute un plat dans la base de donnees
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Plat VALUES (?, ?, ?, ?, ?, 3, ?, ?, 0,?)');
  $query->execute(array($idPlat,$idUtilisateur,$cat,$nomPlat,$descr,$date,$recette,$nom_img));
  $query->closeCursor();
}

function getCategorie(){
  // cette fonction recupere toutes les categories de la base de donnees
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT * FROM Categorie');
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function getIngredients(){
  // cette fonction recupere tous les ingredients de la base de donnees
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT * FROM Ingredient');
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function ajoutImg($img,$idPlat){
  //cette fonction ajoute l'image du plat dans le dossier img/plats
  //recuperer l'extension de l'image
  $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
  // le change par le nom du plat + l'extension
  $nomImg = $idPlat.'.'.$extension;
  $cheminDossier = PATH_PLATS . $nomImg;
  move_uploaded_file($img['tmp_name'], $cheminDossier);
  return $nomImg;
}

function ajoutIngr($idPlat,$idIngr,$quantite,$unite){
  // cette fonction ajoute la composition d'ingredients du plat dans la base de donnees
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Composer VALUES (?, ?, ?, ?)');
  $query->execute(array($idPlat,$idIngr,$quantite,$unite));
  $query->closeCursor();
}

function ajoutAchievement($idUtilisateur,$idAchiev){
  // cette fonction ajoute un achievement a l'utilisateur qui a propose un plat
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Composer_achievement VALUES (?, ?)');
  $query->execute(array($idAchiev,$idUtilisateur));
  $query->closeCursor();
}
function checkAchievement($idUtilisateur,$idAchiev){
  $connexion = Connexion::getInstance()->getBdd();
  // regarde si l'utilisateur à deja l'achievement 1
  $query = $connexion->prepare('SELECT * FROM Composer_achievement WHERE IdUtilisateur=? AND IdAchiev=?');
  $query->execute(array($idUtilisateur));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  // si result est vide alors l'utilisateur n'a pas encore de achievement
  if(empty($result)){
    return false;
  }
  else{
    return true;
  }

}

function reecriture_recette($recette){
  
  // cette fonction reecrit la recette pour qu'elle soit plus lisible et qu'elle soit parsé pour la fiche plat
  $tab_final = array();
  $tab = array();
  $tab = explode("\r", $recette);
  //retire le premier element de $tab
  $recette_final = "ÉTAPE 1:\r".$tab[0]."\r";
  $tab = array_slice($tab, 1);
  //pour chaque parti du tableau on ajoute une partie spécifiant le numero de l'étape
  for ($i=0; $i < count($tab); $i++) {
    $tab_final[$i] = "\rÉTAPE ".($i+2)." : ".$tab[$i]."\r";
  }
  //on concatene les chaines de caractères du tableau
  for ($i=0; $i < count($tab_final); $i++) {
    $recette_final = $recette_final.$tab_final[$i];
  }
  // supprime le dernier retour à la ligne situé à la fin de la chaine de caractère
  $recette_final = substr($recette_final, 0, -1);
  return $recette_final;
}
function getNbPlatUser($idUtilisateur){
  // cette fonction recupere le nombre de plat que l'utilisateur a propose
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT COUNT(*) FROM Plat WHERE IdUtilisateur=?');
  $query->execute(array($idUtilisateur));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result["COUNT(*)"];
}
