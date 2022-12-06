<?php
require_once(PATH_MODELS.'m_recherche.php');

$ingredients = getIngredients();
var_dump($ingredients);

require_once(PATH_VIEWS.$page.'.php');