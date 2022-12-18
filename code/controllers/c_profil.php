<?php
require_once(PATH_MODELS.'m_profil.php');

if(isset($_GET['nom'])){
    if(getUtilisateur($_GET['nom']) != null){
        $utilisateur = getUtilisateur($_GET['nom']);
        $prefCategorie = getPrefCategorie($_GET['nom']);
        $prefIngredients = getPrefIngredients($_GET['nom']);
        $platsFavoris = array();
        $platsAjoutes = getPlatsAjoutes($_GET['nom']);
    }
    else{
        header('Location:index.php?page=404');
    }
}
else{
    header('Location:index.php?page=404');
}

require_once(PATH_VIEWS.$page.'.php');