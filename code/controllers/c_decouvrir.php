<?php

require_once(PATH_MODELS.'m_decouvrir.php');

$plats = getPlats();
$platsMieuxNotes = getPlatsMieuxNotes();

if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1 && isset($_SESSION['id'])){
    if(getUtilisateur($_SESSION['id']) != null){
        $utilisateur = getUtilisateur($_SESSION['id']);
        $prefCategories = getPrefCategorie($_SESSION['id']);
        $prefIngredients = getPrefIngredients($_SESSION['id']);
        $platsCategorie = getPlatsCategorie($prefCategories);
        $platsIngredients = getPlatsIngredients($prefIngredients);
    }
}

require_once(PATH_VIEWS.$page.'.php');