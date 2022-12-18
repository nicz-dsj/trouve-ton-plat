<?php
require_once(PATH_MODELS.'m_supprimercompte.php');

if(isset($_GET['nom'])){
    if(getUtilisateur($_GET['nom']) != null){
        if($_SESSION['logged'] == 1 && $_GET['nom'] == $_SESSION['user']){
            $utilisateur = getUtilisateur($_GET['nom']);

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
    }
    else{
        header('Location:index.php?page=404');
    }
}
else{
    header('Location:index.php?page=404');
}

require_once(PATH_VIEWS.$page.'.php');