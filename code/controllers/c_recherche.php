<?php
require_once(PATH_MODELS.'m_recherche.php');

$ingredients = getIngredients();
$plats = getPlats();

for($i=0; $i<intval(getAssocSize()[0]["COUNT(*)"])+2;$i++){
    var_dump(getAssoc($i));
}

var_dump($liAssoc);

require_once(PATH_VIEWS.$page.'.php');