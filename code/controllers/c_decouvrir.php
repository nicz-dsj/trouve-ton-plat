<?php

require_once(PATH_MODELS.'m_decouvrir.php');

$plats = getPlats();
$platsMieuxNotes = getPlatsMieuxNotes();

if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1 && isset($_SESSION['user'])){
    if(getUtilisateur($_SESSION['user']) != null){
        $utilisateur = getUtilisateur($_SESSION['user']);
        $prefCategories = getPrefCategorie($_SESSION['user']);
        $prefIngredients = getPrefIngredients($_SESSION['user']);
        $platsCategorie = getPlatsCategorie($prefCategories);
        $platsIngredients = getPlatsIngredients($prefIngredients);
    }
}

require_once(PATH_VIEWS.$page.'.php');