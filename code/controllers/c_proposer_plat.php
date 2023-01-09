<?php
require_once(PATH_MODELS.'m_proposer_plat.php'); 

$categories = getCategorie();
$ingredients = getIngredients();
$nb_selects = 0;

if (isset($_SESSION['logged']) && $_SESSION['logged'] = 1) {
    if (isset($_GET['nomPlat'])) {
        $name = htmlspecialchars($_GET['nomPlat']);
        $result = checkNomPlat($name);
        if ($result) {
            echo "true";
        } else {
            echo "false";
        }
    }
    if (isset($_POST['submit'])) {
        $tableau_idIngr = array();
        $idPlat = getMaxId() + 1;
        $nb_select = $_POST['variable_js'];
        $nomImg = ajoutImg($_FILES['image'],$idPlat);
        addPlat($idPlat, $_SESSION['id'], $_POST['nomPlat'], $_POST['descr'], date("Y-m-d"), $_POST['cat'], $_POST['recette'], $nomImg);
        //si nb_select est supérieur a 1, on ajoute les ingredients
        ajoutIngr($idPlat, $_POST['ingr'], $_POST['quantite']);
        array_push($tableau_idIngr, $_POST['ingr']);
        if ($nb_select > 1) {
            for ($i = 1; $i < $nb_select; $i++) {
                //créer un tableau
                $idIngr = $_POST['ingr' . $i];
                if (!in_array($idIngr, $tableau_idIngr)) {
                    array_push($tableau_idIngr, $idIngr);
                    ajoutIngr($idPlat, $idIngr, $_POST['quantite' . $i]);
                }
            }
        }

    }

    
}

else{
    header('Location:index.php?page=login');
}


require_once(PATH_VIEWS.$page.'.php');