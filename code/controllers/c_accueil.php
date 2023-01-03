<?php
//appel du modèle
require_once(PATH_MODELS.'m_accueil.php');

$users = test();

//appel de la vue
require_once(PATH_VIEWS.$page.'.php');