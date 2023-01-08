<?php
require_once(PATH_MODELS.'m_proposer_plat.php'); 

$categories = getCategorie();

if(isset($_SESSION['logged']) && $_SESSION['logged'] = 1){
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
    
    if(isset($_POST['submit'])){
        $idPlat = getMaxId() + 1;
        $nomImg = ajoutImg($_FILES['image'], $_POST['nomPlat']);
        addPlat($idPlat,$_SESSION['id'],$_POST['nomPlat'],$_POST['descr'],date("Y-m-d"),$_POST['cat'],$_POST['recette'],$nomImg);
    }
}
else{
    header('Location:index.php?page=login');
}


require_once(PATH_VIEWS.$page.'.php');