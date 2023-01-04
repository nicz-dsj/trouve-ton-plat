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

  function addPlat($idPlat,$nomPlat,$descr,$date,$cat,$recette, $img)
{
  $username = $_SESSION['user']; 
  $id = getId($username);
  $nom_img = ajoutImg($img,$nomPlat);
  echo $nom_img;
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Plat VALUES (?, ?, ?, ?, ?, 3, ?, ?, 0,?)');
  $query->execute(array($idPlat,$id,$cat,$nomPlat,$descr,$date,$recette,$nom_img));
  $query->closeCursor();
}

function addUser($id,$pseudo,$date,$mail,$pwd,$desc)
{
  $avatar = "avatar1";
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Utilisateur VALUES (?, ?, ?, ?, ?, ?, 0, ?)');
  var_dump(array($id,$pseudo,$date,$mail,$pwd,$desc));
  $query->execute(array($id,$pseudo,$date,$mail,$pwd,$desc,$avatar));
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

function getId($username){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT IdUtilisateur FROM Utilisateur WHERE pseudoUtilisateur=?');
  $query->execute(array($username));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result["IdUtilisateur"];
}

function ajoutImg($img,$nomPlat){
  //recuperer le nom de l'img
  $nomImg = $img['name'];
  // le change par le nom du plat + l'extension
  $nomImg = $nomPlat;
  $cheminDossier = PATH_PLATS . $nomImg;
  move_uploaded_file($nomImg, $cheminDossier);
  return $nomImg;
}