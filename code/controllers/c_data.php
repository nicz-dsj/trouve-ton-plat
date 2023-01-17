<?php 

require_once(PATH_MODELS.'m_data.php');

if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
    $utilisateur = getUtilisateur($_SESSION['id']);
    $prefCategorie = getPrefCategorie($utilisateur[0]['idUtilisateur']);
    $prefIngredients = getPrefIngredients($utilisateur[0]['idUtilisateur']);
    $platsAjoutes = getPlatsAjoutes($utilisateur[0]['idUtilisateur']);
    $platsFavoris = getPlatsFavoris($utilisateur[0]['idUtilisateur']);
    $eventsParticipes = getEventParticipes($utilisateur[0]['idUtilisateur']);
    $succes = getSucces($utilisateur[0]['idUtilisateur']);

    $prefCategorieFetch = "";
    $prefIngredientsFetch = "";
    $platsAjoutesFetch = "";
    $platsFavorisFetch = "";
    $eventsParticipesFetch = "";
    $succesFetch = "";

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
    header('Location:index.php?page=403');
}

require_once(PATH_VIEWS.$page.'.php');