<?php
require_once(PATH_MODELS.'m_recherche.php');

$ingredients = getIngredients();
$plats = getPlats();

require_once(PATH_VIEWS.$page.'.php');