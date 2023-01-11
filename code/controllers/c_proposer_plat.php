<?php
require_once(PATH_MODELS.'m_proposer_plat.php'); 

// recupère les catégories, ingrédients et définit le nombre de select ajoutés
$categories = getCategorie();
$ingredients = getIngredients();
$nb_selects = 0;
$nb_plat_user = getNbPlatUser($_SESSION['id']);

// si l'utilisateur est connecté
if (isset($_SESSION['logged']) && $_SESSION['logged'] = 1) {
    // si le nom du plat existe et qu'il est libre
    if (isset($_GET['nomPlat'])) {
        $name = htmlspecialchars($_GET['nomPlat']);
        $result = checkNomPlat($name);
        if ($result) {
            echo "true";
        } else {
            echo "false";
        }
    }
    // si le formulaire est envoyé
    if (isset($_POST['submit'])) {

        // on crée un tableau pour stocker les id des ingrédients pour plus tard éviter les répétitions
        $tableau_idIngr = array();

        // on recupère l'id du plat
        $idPlat = getMaxId() + 1;

        // on recupère combien de selecteur nous avons grâce au js
        $nb_select = $_POST['variable_js'];

        // on ajoute l'image à la bd
        $nomImg = ajoutImg($_FILES['image'],$idPlat);

        // on réecrit la recette
        $recette = reecriture_recette($_POST['recette']);

        // on met une condition si l'utilisateur à 4 plats ajouté et qu'il en rentre un nouveau il obtient un nouveau succès
        if ($nb_plat_user==4){
            ajoutAchievements($_SESSION['id'], 3);
        }

        // on ajoute le plat à la bd
        addPlat($idPlat, $_SESSION['id'], $_POST['nomPlat'], $_POST['descr'], date("Y-m-d"), $_POST['cat'], $recette, $nomImg);

        // on ajoute le premier ingrédient qui est directement créer en html
        ajoutIngr($idPlat, $_POST['ingr'], $_POST['quantite'],$_POST['unite']);

        // on ajoute cette l'id de cette ingrédient dans le tableau pour s'en souvenir
        array_push($tableau_idIngr, $_POST['ingr']);

        // si il y a plus d'un select ça veut dire qu'on en a ajouté en JS
        if ($nb_select > 1) {
            
            for ($i = 1; $i < $nb_select; $i++) {
                $idIngr = $_POST['ingr' . $i];
                
                //si cet ingrédients n'a pas déjà été ajouté avant, alors on l'ajoute
                if (!in_array($idIngr, $tableau_idIngr)) {
                    array_push($tableau_idIngr, $idIngr);
                    ajoutIngr($idPlat, $idIngr, $_POST['quantite' . $i],$_POST['unite' . $i]);
                }
            }
        }
        if ($_POST['easter_egg_musique'] == 1) {
            if (!checkAchievement($_SESSION['id'], 1)) {
                ajoutAchievement($_SESSION['id'], 1);
            }
        }

    }

    
}

else{
    header('Location:index.php?page=login');
}


require_once(PATH_VIEWS.$page.'.php');