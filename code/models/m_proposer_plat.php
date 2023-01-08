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

function getMaxId(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT MAX(IdPlat) FROM Plat');
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result["MAX(IdPlat)"];
  }

function addPlat($idPlat,$idUtilisateur,$nomPlat,$descr,$date,$cat,$recette, $nom_img){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Plat VALUES (?, ?, ?, ?, ?, 3, ?, ?, 0,?)');
  $query->execute(array($idPlat,$idUtilisateur,$cat,$nomPlat,$descr,$date,$recette,$nom_img));
  $query->closeCursor();
}

function getCategorie(){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT * FROM Categorie');
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function getIngredients(){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT * FROM Ingredient');
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}

function ajoutImg($img,$nomPlat){
  //recuperer l'extension de l'image
  $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
  // le change par le nom du plat + l'extension
  $nomImg = $nomPlat.'.'.$extension;
  $cheminDossier = PATH_PLATS . $nomImg;
  move_uploaded_file($img['tmp_name'], $cheminDossier);
  return $nomImg;
}

function ajoutIngr($idPlat,$idIngr){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Composer VALUES (?, ?)');
  // si on a qu'un seul ingrédient
  if(!is_array($idIngr)){
    $query->execute(array($idPlat,$idIngr));
  }
  // si on a plusieurs ingrédients
  else{
    for ($i=0; $i < count($idIngr); $i++){
      $query->execute(array($idPlat,$idIngr[$i]));
    }
  }
}