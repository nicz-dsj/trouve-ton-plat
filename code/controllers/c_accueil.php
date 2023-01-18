<?php
//appel du modèle
require_once(PATH_MODELS.'m_accueil.php');

$users = test();
$platJour = getPlatJour();
if($platJour[0]['DateJ'] != date('Y-m-d')){
    $newId = rand(1, getNbPlat()[0]['nbPlat']);
    while($newId == $platJour[0]['IdPlat'])
        $newId = rand(1, getNbPlat()[0]['nbPlat']);
    updatePlatJour($platJour[0]['IdPlat'], $platJour[0]['DateJ'], date('Y-m-d'), $newId);
    $platJour = getPlatJour();
}
$platJour = getPlat($platJour[0]['IdPlat']);
$platPop = getPlat(getFavMax()[0]['IdPlat']);
//appel de la vue
require_once(PATH_VIEWS.$page.'.php');