<?php
require_once(PATH_MODELS.'m_supprimercompte.php');

if((isset($_SESSION['logged']) && $_SESSION['logged'] == 1) && isset($_SESSION['user']) && getUtilisateur($_SESSION['user']) != null){
    $utilisateur = getUtilisateur($_SESSION['user']);

    if(isset($_POST['currentpwd'])){
        if(password_verify($_POST['currentpwd'], $utilisateur[0]['motDePasse'])){
            echo '<div class="resultxhr" style="display:none;">true</div>';
        }
        else{
            echo '<div class="resultxhr" style="display:none;">false</div>';
        }
    } 
    
    if(isset($_POST['submit'])){
        $valeur = deleteUtilisateur($utilisateur[0]['idUtilisateur']);
        if($valeur > 0){
            $_SESSION['logged'] = array();
            $_SESSION['user'] = array();
            header('Location:index.php');
        }
    }
}
else{
    header('Location:index.php?page=403');
}

require_once(PATH_VIEWS.$page.'.php');