<?php

// Charge le fichier de connexion à la base de données
require_once(PATH_MODELS.'Connexion.php');

/**
 * Vérifie si un pseudo est déjà utilisé par un autre utilisateur
 * 
 * @param string $nouvPseudo Le nouveau pseudo à vérifier
 * @return array|bool Les données de l'utilisateur si le pseudo est déjà utilisé, false sinon
 */
function checkPseudo($nouvPseudo){
  // Récupère l'instance de connexion à la base de données
  $connexion = Connexion::getInstance()->getBdd();
  
  // Prépare la requête SQL pour récupérer l'utilisateur ayant le pseudo spécifié
  $query = $connexion->prepare('SELECT pseudoUtilisateur FROM Utilisateur WHERE pseudoUtilisateur=?');
  
  // Exécute la requête en passant le nouveau pseudo en paramètre
  $query->execute(array($nouvPseudo,));
  
  // Récupère les résultats sous forme de tableau associatif
  $result = $query->fetch(PDO::FETCH_ASSOC);
  
  // Ferme le curseur de la requête
  $query->closeCursor();
  
  // Retourne les résultats ou false si aucun utilisateur n'a été trouvé
  return $result;
}


/**
 * Vérifie si une adresse email est déjà utilisée par un autre utilisateur
 * 
 * @param string $nouvMail L'adresse email à vérifier
 * @return array|bool Les données de l'utilisateur si l'adresse email est déjà utilisée, false sinon
 */
function checkmail($nouvMail){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT mail FROM Utilisateur WHERE mail=?');
  $query->execute(array($nouvMail,));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result;
}


/**
 * Récupère l'ID le plus élevé utilisé dans la table Utilisateur
 * 
 * @return int L'ID le plus élevé
 */
function getMaxId(){
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('SELECT MAX(idUtilisateur) FROM Utilisateur');
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $result["MAX(idUtilisateur)"];
}


/**
 * Ajoute un nouvel utilisateur à la base de données
 * 
 * @param int $id L'ID de l'utilisateur
 * @param string $pseudo Le pseudo de l'utilisateur
 * @param string $date La date de création de l'utilisateur
 * @param string $mail L'adresse email de l'utilisateur
 * @param string $pwd Le mot de passe de l'utilisateur
 * @param string $desc La description de l'utilisateur
 */
function addUser($id,$pseudo,$date,$mail,$pwd,$desc)
{
  $connexion = Connexion::getInstance()->getBdd();
  $query = $connexion->prepare('INSERT INTO Utilisateur VALUES (?, ?, ?, ?, ?, ?, 0)');
  var_dump(array($id,$pseudo,$date,$mail,$pwd,$desc));
  $query->execute(array($id,$pseudo,$date,$mail,$pwd,$desc));
  $query->closeCursor();
}
