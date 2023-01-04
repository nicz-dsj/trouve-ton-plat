<?php
require_once(PATH_MODELS.'m_proposer_plat.php'); 

$categories = getCategorie();

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

if(isset($_POST['nomPlat']) && isset($_POST['descr']) && isset($_POST['cat']) && isset($_POST['recette']) && !empty($_FILES['img'])){
    $idPlat = getMaxId() + 1;

    addPlat($idPlat,$_POST['nomPlat'],$_POST['descr'],date("Y-m-d"),$_POST['cat'],$_POST['recette'],$_FILES['img']);
}
require_once(PATH_VIEWS.$page.'.php');