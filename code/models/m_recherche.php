<?php

require_once(PATH_MODELS.'Connexion.php');


function getIngredients(){
    $connexion = Connexion::getInstance()->getBdd();
    $query = $connexion->prepare('SELECT Nom FROM Ingredient');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}