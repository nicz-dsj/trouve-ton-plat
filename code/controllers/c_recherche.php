<?php
require_once(PATH_MODELS.'m_recherche.php');

$ingredients = getIngredients();
$plats = getPlats();
$liAssoc = array();
$liAssocHTML = array();

for($i=0; $i<intval(getAssocSize()[0]["COUNT(*)"])+2;$i++){
    $liAssoc[$i] = getAssoc($i);
}

for($i=1; $i<sizeof($liAssoc);$i++){

    for($j=0; $j<sizeof($liAssoc[$i]);$j++){
        $liAssocHTML[$i][$j] = $liAssoc[$i][$j]["IdIngredient"];

        echo($liAssocHTML[$i][$j]);
    }

}

sizeof($liAssocHTML[1]);

if (isset($_POST['frecherche'])) {
    $recherche = $_POST['frecherche'];
    $plats = recherchePlat($recherche);
    print_r($plats);
}

require_once(PATH_VIEWS.$page.'.php');