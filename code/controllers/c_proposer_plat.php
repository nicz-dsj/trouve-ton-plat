<?php
require_once(PATH_MODELS.'m_proposer_plat.php');
if(isset($_GET['nomPlat'])){
    $name = htmlspecialchars($_GET['nomPlat']);
    $result = checkNomPlat($name);
    if($result){
        echo "true";
    }
    else{
        echo "false";
    }
}

if(isset($_POST['nomPlat']) && isset($_POST['descr']) && isset($_POST['cat']) && isset($_POST['recette'])){
    $idPlat = getMaxId() + 1;

    addPlat($idPlat,$_POST['nomPlat'],$_POST['descr'],date("Y-m-d"),$_POST['cat'],$_POST['recette']);
}
require_once(PATH_VIEWS.$page.'.php');