<?php
require_once(PATH_MODELS.'m_modifierprofil.php');

if((isset($_SESSION['logged']) && $_SESSION['logged'] == 1) && isset($_SESSION['id']) && getUtilisateur($_SESSION['id']) != null){
        $utilisateur = getUtilisateur($_SESSION['id']);
        $categories = getCategories();
        $ingredients = getIngredients();
        $prefCategorie = getPrefCategorie($_SESSION['id']);
        $prefIngredients = getPrefIngredients($_SESSION['id']);

        if(isset($_POST['avatarsubmit']) && isset($_POST['avatar'])){
            changeAvatar($_POST['avatar'], $utilisateur[0]['idUtilisateur']);
            header("Refresh:0");
        }

        if(isset($_POST['updaterequest'])){
            if(isset($_POST['login'])){
                if(isUsername($_POST['login'])){
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            }

            if(isset($_POST['mail'])){
                if(isMail($_POST['mail'])){
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            }

            if(isset($_POST['currentpwd'])){
                if(password_verify($_POST['currentpwd'], $utilisateur[0]['motDePasse'])){
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            }   
        }

        if(isset($_POST['updateloginsubmit'])){
            if(isset($_POST['login'])){
                updateLogin($_POST['login'], $utilisateur[0]['idUtilisateur']);
                header("Refresh:0");
            }
        }

        if(isset($_POST['updatemailsubmit'])){
            if(isset($_POST['mail'])){
                updateMail($_POST['mail'], $utilisateur[0]['idUtilisateur']);
                header("Refresh:0");
            }
        }

        if(isset($_POST['updatepwdsubmit'])){
            if(isset($_POST['newpwd'])){
                updatePwd(password_hash($_POST['newpwd'],PASSWORD_DEFAULT), $utilisateur[0]['idUtilisateur']);
                header("Refresh:0");
            }
        }

        if(isset($_POST['updateaboutsubmit'])){
            if(isset($_POST['about'])){
                updateAbout($_POST['about'], $utilisateur[0]['idUtilisateur']);
                header("Refresh:0");
            }
        }

        if(isset($_POST['prefcategoriesubmit'])){
            $valeur;
            if(!isset($_POST['prefcategorie'])){
                if(count($prefCategorie) > 0){
                    deleteAllPrefCategories($utilisateur[0]['idUtilisateur']);
                }
            }
            else{
                if(count($prefCategorie) > 0){
                    deleteAllPrefCategories($utilisateur[0]['idUtilisateur']);
                }
                addPrefCategories($_POST['prefcategorie'], $utilisateur[0]['idUtilisateur']);
            }
            
            header("Refresh:0");
        }

        if(isset($_POST['prefingredientsubmit'])){
            $valeur;
            if(!isset($_POST['prefingredient'])){
                if(count($prefIngredients) > 0){
                    deleteAllPrefIngredients($utilisateur[0]['idUtilisateur']);
                }
            }
            else{
                if(count($prefIngredients) > 0){
                    $valeur = deleteAllPrefIngredients($utilisateur[0]['idUtilisateur']);
                }
                addPrefIngredients($_POST['prefingredient'], $utilisateur[0]['idUtilisateur']);
            }

            header("Refresh:0");
        }
}
else{
    header('Location:index.php?page=403');
}

require_once(PATH_VIEWS.$page.'.php');