<?php

// appel du modèle
require_once(PATH_MODELS.'m_profil.php');

// Dans le cas où un identifiant est set dans l'URL
if(isset($_GET['id'])){
    // Dans le cas où l'indentifiant correspond à un utilisateur
    $utilisateur = getUtilisateur($_GET['id']);
    if(isset($utilisateur)){
        // Préférences de catégorie de plats
        $prefCategorie = getPrefCategorie($utilisateur['idUtilisateur']);
        // Préférences d'ingrédients
        $prefIngredients = getPrefIngredients($utilisateur['idUtilisateur']);
        // Plats favoris de l'utilisateur
        $platsFavoris = getPlatsFavoris($utilisateur['idUtilisateur']);
        // Plats rajoutés par l'utilisateur
        $platsAjoutes = getPlatsAjoutes($utilisateur['idUtilisateur']);
        // Les succès de l'utilisateur
        $achievementsFromUser = getAchievementFromUser($utilisateur['idUtilisateur']);
        for ($i=0; $i < count($achievementsFromUser); $i++) { 
            $achievementsFromBd[$i] = getAchievementFromBd($achievementsFromUser[$i]['idAchiev']);
        }
    }
    else{
        // Renvoi à la page 404
        header('Location:index.php?page=404');
    }
}
else{
    // Renvoi à la page 404
    header('Location:index.php?page=404');
}

// appel de la vue
require_once(PATH_VIEWS.$page.'.php');