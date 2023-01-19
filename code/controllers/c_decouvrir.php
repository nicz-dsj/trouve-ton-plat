<?php

// appel du modèle
require_once(PATH_MODELS.'m_decouvrir.php');

// Liste des plats
$plats = getPlats();
// Liste des plats les mieux notés
$platsMieuxNotes = getPlatsMieuxNotes();

// Dans le cas où l'on est connecté
if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1 && isset($_SESSION['id'])){
    // Dans le cas où l'identifiant contenu dans $_SESSION correspond à un utilisateur
    $utilisateur = getUtilisateur($_SESSION['id']);
    if(isset($utilisateur)){
        // Préférences de catégories de plat de l'utilisateur
        $prefCategories = getPrefCategorie($utilisateur['idUtilisateur']);
        // Préférences d'ingrésients de l'utilisateur
        $prefIngredients = getPrefIngredients($utilisateur['idUtilisateur']);
        // Plats en fonction des préférences de catégorie de l'utilisateur
        $platsCategorie = getPlatsCategorie($prefCategories);
        // Plats en fonction des préférences d'ingrédients de l'utilisateur
        $platsIngredients = getPlatsIngredients($prefIngredients);
    }
}

// appel de la vue
require_once(PATH_VIEWS.$page.'.php');