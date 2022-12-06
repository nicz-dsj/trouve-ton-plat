<?php
require_once(PATH_MODELS.'m_recherche.php');

$ingredients = getIngredients();

require_once(PATH_VIEWS.$page.'.php');