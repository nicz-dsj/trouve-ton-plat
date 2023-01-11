<?php
require_once(PATH_MODELS.'m_profil.php');

if(isset($_GET['id'])){
    if(getUtilisateur($_GET['id']) != null){
        $utilisateur = getUtilisateur($_GET['id']);
        $prefCategorie = getPrefCategorie($_GET['id']);
        $prefIngredients = getPrefIngredients($_GET['id']);
        $platsFavoris = getPlatsFavoris($_GET['id']);
        $platsAjoutes = getPlatsAjoutes($_GET['id']);
        $achievementsFromUser = getAchievementFromUser($_GET['id']);
        for ($i=0; $i < count($achievementsFromUser); $i++) { 
            $achievementsFromBd[$i] = getAchievementFromBd($achievementsFromUser[$i]['idAchiev']);
        }
    }
    else{
        header('Location:index.php?page=404');
    }
}
else{
    header('Location:index.php?page=404');
}


require_once(PATH_VIEWS.$page.'.php');