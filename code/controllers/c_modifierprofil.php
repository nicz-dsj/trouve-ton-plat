<?php

// appel du modèle
require_once(PATH_MODELS.'m_modifierprofil.php');

// Dans le cas où l'on est connecté
if((isset($_SESSION['logged']) && $_SESSION['logged'] == 1) && isset($_SESSION['id'])){
    // Dans le cas où l'identifiant set dans $_SESSION correspond à un utilisateur
    $utilisateur = getUtilisateur($_SESSION['id']);
    if(isset($utilisateur)){
        // Les catégories de plats
        $categories = getCategories();
        // Les ingrédients
        $ingredients = getIngredients();
        // Les préférences de catégories de plats
        $prefCategorie = getPrefCategorie($utilisateur['idUtilisateur']);
        // Les préférences d'ingrédients
        $prefIngredients = getPrefIngredients($utilisateur['idUtilisateur']);

        // Dans le cas où l'on souhaite changer l'avatar du profil utilisateur
        if(isset($_POST['avatarsubmit']) && isset($_POST['avatar'])){
            // Changement de l'avatar du profil utilisateur
            changeAvatar($_POST['avatar'], $utilisateur['idUtilisateur']);
            // Reload de la page
            header("Refresh:0");
        }

        // Requête envoyée par le module XMLHttpRequest de JavaScript
        // Dans le cas où l'on tape sur une des barres de modification d'informations relatives au profil utilisateur pour y réaliser des vérifications
        if(isset($_POST['updaterequest'])){
            // Dans le cas où l'on veut vérifier le nom d'utilisateur
            if(isset($_POST['login'])){
                // Dans le cas où le nom d'utilisateur est déjà utilisé
                if(isUsername($_POST['login'])){
                    // Envoi de la réponse indiquant que le nom d'utilisateur est déjà utilisé
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    // Envoi de la réponse indiquant que le nom d'utilisateur n'est pas utilisé
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            }

            // Dans le cas où l'on veut vérifier l'adresse mail
            if(isset($_POST['mail'])){
                // Dans le cas où l'adresse mail est déjà utilisée
                if(isMail($_POST['mail'])){
                    // Envoi de la réponse indiquant que l'adresse mail est déjà utilisée
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    // Envoi de la réponse indiquant que l'adresse mail n'est pas utilisée
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            }

            // Dans le cas où l'on veut vérifier le mot de passe
            if(isset($_POST['currentpwd'])){
                // Dans le cas où le mot de passe correspond au mot de passe crypté
                if(password_verify($_POST['currentpwd'], $utilisateur['motDePasse'])){
                    // Envoi de la réponse indiquant que le mot de passe correspond
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    // Envoi de la réponse indiquant que le mot de passe ne correspond pas
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            }   
        }

        // Dans le cas où l'on soumet les modifications du nom d'utilisateur
        if(isset($_POST['updateloginsubmit'])){
            // Dans le cas où le nom d'utilisateur est set
            if(isset($_POST['login'])){
                // Mise a jour du nom d'utilisateur
                updateLogin($_POST['login'], $utilisateur['idUtilisateur']);
                // Reload de la page
                header("Refresh:0");
            }
        }

        // Dans le cas où l'on soumet les modifications de l'adresse mail
        if(isset($_POST['updatemailsubmit'])){
            // Dans le cas où l'adresse mail est set
            if(isset($_POST['mail'])){
                // Mise a jour le l'adresse mail
                updateMail($_POST['mail'], $utilisateur['idUtilisateur']);
                // Reload de la page
                header("Refresh:0");
            }
        }

        // Dans le cas où l'on soumet les modifications du mot de passe
        if(isset($_POST['updatepwdsubmit'])){
            // Si le mot de passe est set
            if(isset($_POST['newpwd'])){
                // Mise à jour du mot de passe en cryptant le nouveau mot de passe
                updatePwd(password_hash($_POST['newpwd'],PASSWORD_DEFAULT), $utilisateur['idUtilisateur']);
                // Déconnection du compte
                $_SESSION['logged'] = array();
                $_SESSION['id'] = array();
                // Retour à la page de connection
                header('Location:index.php?page=login');
            }
        }

        // Dans le cas où l'on soumet les modifications de la description de profil
        if(isset($_POST['updateaboutsubmit'])){
            // Si la description de profil est set
            if(isset($_POST['about'])){
                // Mise à jour de la description
                updateAbout($_POST['about'], $utilisateur['idUtilisateur']);
                // Reload de la page
                header("Refresh:0");
            }
        }

        // Dans le cas où l'on soumet les modifications des préférences de catégories de plat
        if(isset($_POST['prefcategoriesubmit'])){
            // Dans le cas où des préférences n'ont pas été selectionnées
            if(!isset($_POST['prefcategorie'])){
                // Dans le cas où il y a déjà des préférences enregistrées
                if(count($prefCategorie) > 0){
                    // Suppression de toutes les préférences
                    deleteAllPrefCategories($utilisateur['idUtilisateur']);
                }
            }
            else{
                // Dans le cas où il y a déjà des préférences enregistrées
                if(count($prefCategorie) > 0){
                    // Suppression de toutes les préférences
                    deleteAllPrefCategories($utilisateur['idUtilisateur']);
                }
                // Ajout des préférences sélectionnées
                addPrefCategories($_POST['prefcategorie'], $utilisateur['idUtilisateur']);
            }

            // Reload de la page
            header("Refresh:0");
        }

        // Dans le cas où l'on soumet les modifications des préférences d'ingrédients
        if(isset($_POST['prefingredientsubmit'])){
             // Dans le cas où des préférences n'ont pas été selectionnées
            if(!isset($_POST['prefingredient'])){
                // Dans le cas où il y a déjà des préférences enregistrées
                if(count($prefIngredients) > 0){
                    // Suppression de toutes les préférences
                    deleteAllPrefIngredients($utilisateur['idUtilisateur']);
                }
            }
            else{
                // Dans le cas où il y a déjà des préférences enregistrées
                if(count($prefIngredients) > 0){
                    // Suppression de toutes les préférences
                    deleteAllPrefIngredients($utilisateur['idUtilisateur']);
                }
                // Ajout des préférences sélectionnées
                addPrefIngredients($_POST['prefingredient'], $utilisateur['idUtilisateur']);
            }

            // Reload de la page
            header("Refresh:0");
        }

        // Dans le cas où l'on tape sur une des barres de confirmation de mot de passe relatives à la suppression du profil
        if(isset($_POST['deleterequest'])){
            // Si le mot de passe est set
            if(isset($_POST['currentpwd'])){
                // Dans le cas où le mot de passe correspond au mot de passe crypté
                if(password_verify($_POST['currentpwd'], $utilisateur['motDePasse'])){
                    // Envoi de la réponse indiquant que le mot de passe correspond
                    echo '<div class="resultxhr" style="display:none;">true</div>';
                }
                else{
                    // Envoi de la réponse indiquant que le mot de passe ne correspond pas
                    echo '<div class="resultxhr" style="display:none;">false</div>';
                }
            } 
        }

        // Dans le cas où l'on soumet l'envie de supprimer le profil
        if(isset($_POST['deletesubmit'])){
            // Suppression du profil
            deleteUtilisateur($utilisateur['idUtilisateur']);
            // Déconnection du compte
            $_SESSION['logged'] = array();
            $_SESSION['id'] = array();
            // Retour à la page d'accueil
            header('Location:index.php');
        }
    }
    else{
        // Renvoi à la page 403
        header('Location:index.php?page=403');
    }       
}
else{
    // Renvoi à la page 403
    header('Location:index.php?page=403');
}


// appel de la vue
require_once(PATH_VIEWS.$page.'.php');