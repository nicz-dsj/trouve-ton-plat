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
    $id = $_SESSION['id'];
    $nomPlat = htmlspecialchars($_POST['nomPlat']);
    $descr = htmlspecialchars($_POST['descr']);
    $cat =($_POST['cat']);
    $recette = htmlspecialchars($_POST['recette']);
    addPlat($nomPlat,$descr,$cat,$recette);
}
require_once(PATH_VIEWS.$page.'.php');