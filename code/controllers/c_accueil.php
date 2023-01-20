<?php
//appel du modèle
require_once(PATH_MODELS.'m_accueil.php');
date_default_timezone_set('Europe/Paris');

$users = test();
$platJour = getPlatJour();
$rand= rand(1, getNbPlat()[0]['nbPlat']);
if($platJour[0]['DateJ'] != date('Y-m-d')){
    $newId = rand(1, getNbPlat()[0]['nbPlat']);
    while($newId == $platJour[0]['IdPlat'])
        $newId = rand(1, getNbPlat()[0]['nbPlat']);
    updatePlatJour($platJour[0]['IdPlat'], $platJour[0]['DateJ'], date('Y-m-d'), $newId);
    $platJour = getPlatJour();
};
while($platJour[0]['IdPlat'] == $rand || $rand == getFavMax()[0]['IdPlat']){
    $rand = rand(1, getNbPlat()[0]['nbPlat']);
};
$platJour = getPlat($platJour[0]['IdPlat']);
$platPop = getPlat(getFavMax()[0]['IdPlat']);
//appel de la vue
require_once(PATH_VIEWS.$page.'.php');