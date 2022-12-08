<?php
require_once(PATH_MODELS.'m_recherche.php');

$ingredients = getIngredients();
$plats = getPlats();

for($i=0; $i<intval(getAssocSize()[0]["COUNT(*)"])+2;$i++){
    var_dump(getAssoc($i));
}

var_dump($liAssoc);

if (isset($_GET['frecherche'])) {
    $recherche = $_GET['frecherche'];
    $plats = recherchePlat($recherche);
    print_r($plats);
}

require_once(PATH_VIEWS.$page.'.php');