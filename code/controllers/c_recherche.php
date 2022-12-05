<?php
require_once(PATH_MODELS.'m_recherche.php');

if (isset($_GET['frecherche'])) {
    $recherche = $_GET['frecherche'];
    /*$recherches = str
    for($recherches as $plat)*/
    $plats = recherchePlat($recherche);
    print_r($plats);
}

require_once(PATH_VIEWS.$page.'.php');