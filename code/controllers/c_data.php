<?php 

// appel du modèle
require_once(PATH_MODELS.'m_data.php');

// Dans le cas où on est connecté
if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
    // Dans le cas où l'identifiant stockée dans $_SESSION correspond à un utilisateur
    $utilisateur = getUtilisateur($_SESSION['id']);
    if(isset($utilisateur)){
        // Préférences de catégories de plat de l'utlisateur
        $prefCategorie = getPrefCategorie($utilisateur['idUtilisateur']);
        // Préférences d'ingredients de l'utlisateur
        $prefIngredients = getPrefIngredients($utilisateur['idUtilisateur']);
        // Plats ajoutés par l'utilisateur
        $platsAjoutes = getPlatsAjoutes($utilisateur['idUtilisateur']);
        // Plats favoris de l'utilisateur
        $platsFavoris = getPlatsFavoris($utilisateur['idUtilisateur']);
        // Les évènements participés par l'utilisateur
        $eventsParticipes = getEventParticipes($utilisateur['idUtilisateur']);
        // Les succès de l'utilisateurs
        $succes = getSucces($utilisateur['idUtilisateur']);
    
        // Chaines de caractères concaténant toutes les informations de l'utilisateur
        $prefCategorieFetch = "";
        $prefIngredientsFetch = "";
        $platsAjoutesFetch = "";
        $platsFavorisFetch = "";
        $eventsParticipesFetch = "";
        $succesFetch = "";
    
        // Mise en chaîne de caractère de toutes les préférences de catégorie de l'utilisateur
        if(count($prefCategorie) > 0){
            for($i = 0; $i < count($prefCategorie); $i++){
                if($i < count($prefCategorie) - 1){
                    $prefCategorieFetch = $prefCategorieFetch . " " . $prefCategorie[$i]['Nom'] . ",";
                }
                else{
                    $prefCategorieFetch = $prefCategorieFetch . " " . $prefCategorie[$i]['Nom'] . ".";
                }
            }
        }
        else{
            $prefCategorieFetch = "Aucune préférence de catégorie.";
        }
    
        // Mise en chaîne de caractère de toutes les préférences d'ingrédients de l'utilisateur
        if(count($prefIngredients) > 0){
            for($i = 0; $i < count($prefIngredients); $i++){
                if($i < count($prefIngredients) - 1){
                    $prefIngredientsFetch = $prefIngredientsFetch . " " . $prefIngredients[$i]['Nom'] . ",";
                }
                else{
                    $prefIngredientsFetch = $prefIngredientsFetch . " " . $prefIngredients[$i]['Nom'] . ".";
                }
            }
        }
        else{
            $prefIngredientsFetch = "Aucune préférence d'ingrédients.";
        }
    
        // Mise en chaîne de caractère de tous les plats ajoutés par l'utilisateur
        if(count($platsAjoutes) > 0){
            for($i = 0; $i < count($platsAjoutes); $i++){
                if($i < count($platsAjoutes) - 1){
                    $platsAjoutesFetch = $platsAjoutesFetch . " " . $platsAjoutes[$i]['Nom'] . ",";
                }
                else{
                    $platsAjoutesFetch = $platsAjoutesFetch . " " . $platsAjoutes[$i]['Nom'] . ".";
                }
            }
        }
        else{
            $platsAjoutesFetch = "Aucun plat ajouté.";
        }
    
        // Mise en chaîne de caractère de tous les plats favoris de l'utilisateur
        if(count($platsFavoris) > 0){
            for($i = 0; $i < count($platsFavoris); $i++){
                if($i < count($platsFavoris) - 1){
                    $platsFavorisFetch = $platsFavorisFetch . " " . $platsFavoris[$i]['Nom'] . ",";
                }
                else{
                    $platsFavorisFetch = $platsFavorisFetch . " " . $platsFavoris[$i]['Nom'] . ".";
                }
            }
        }
        else{
            $platsFavorisFetch = "Aucun plat en favoris.";
        }
    
        // Mise en chaîne de caractère de tous les plats favoris de l'utilisateur
        if(count($eventsParticipes) > 0){
            for($i = 0; $i < count($eventsParticipes); $i++){
                if($i < count($eventsParticipes) - 1){
                    $eventsParticipesFetch = $eventsParticipesFetch . " " . $eventsParticipes[$i]['NomEvenement'] . ",";
                }
                else{
                    $eventsParticipesFetch = $eventsParticipesFetch . " " . $eventsParticipes[$i]['NomEvenement'] . ".";
                }
            }
        }
        else{
            $eventsParticipesFetch = "N'a participé à aucun évènement.";
        }
    
        // Mise en chaîne de caractère de tous les succès de l'utilisateur
        if(count($succes) > 0){
            for($i = 0; $i < count($succes); $i++){
                if($i < count($succes) - 1){
                    $succesFetch = $succesFetch . " " . $succes[$i]['nameAchiev'] . ",";
                }
                else{
                    $succesFetch = $succesFetch . " " . $succes[$i]['nameAchiev'] . ".";
                }
            }
        }
        else{
            $succesFetch = "Aucun succès.";
        }
    }
    else{
        // Renvoi sur la page 404
        header('Location:index.php?page=404');
    }
}
else{
    // Renvoi sur la page 403
    header('Location:index.php?page=403');
}

// appel de la vue
require_once(PATH_VIEWS.$page.'.php');