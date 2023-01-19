<?php 

//appel du modèle
require_once(PATH_MODELS.'m_evenements.php');

$categories = getCategories();
$ingredients = getIngredients();

// Dans le cas où un évènement est set dans l'URL
if(isset($_GET['id'])){
    // Dans le cas où l'identifiant set correspond à un évènement
    $event = getEvent($_GET['id']);
    if(isset($event)){
        // Nombre de participants
        $nbparticipants = getNbParticipants($event['IdEvenement']);
        // Les autres évènements en cours
        $currentEvents = getCurrentEvents($event['IdEvenement']);
        // Les plats participants
        $plats = getEventPlats($event['IdEvenement']);

        // Dans le cas où la date est supérieure à la date de fin de l'évènement
        if(strtotime(date('Y-m-d')) > strtotime($event['DateFin'])){
            // On met en variable le gagnant
            $gagnant = getGagnant($event['IdEvenement']);
        }

        // Dans le cas où la catégorie d'évènement est 2 (évènement de type vote de la communauté)
        if($event['Categorie'] == 2){
            // Si on est connecté et qu'on a déjà voté
            if(isset($_SESSION['id']) && haveVote($_SESSION['id'], $event['IdEvenement'])){
                // On met en variable le plat qu'on a voté
                $platVote = getPlatVote($_SESSION['id'], $event['IdEvenement']);
            }
        }

        // Dans le cas où on est connecté
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
            // Dans le cas où on a participé à l'évènement courant
            if(haveParticipation($_SESSION['id'], $event['IdEvenement'])){
                // On met en variable le plat qu'on a soumis en candidature ultérieurement
                $userPlatEvent = getPlat($_SESSION['id'], $event['IdEvenement']);
            }

            // Dans le cas où on soumet une candidature
            if(isset($_POST['submitplat'])){
                // Dans le cas où on a participé
                if(haveParticipation($_SESSION['id'], $event['IdEvenement'])){
                    // ID du plat auquel on a candidaté
                    $idPlat = $userPlatEvent['IdPlatEvent'];
                    // Recette du plat soumise en candidature
                    $recette = reecriture_recette($_POST['recette']);
                    // Nom de l'image du plat qu'on a soumise en candidature
                    $nomImg = ajoutImg($_FILES['image'], $idPlat);
                    // Mise à jour du plat
                    updatePlat($_SESSION['id'], $event[0]['IdEvenement'], $_POST['nomplat'], $_POST['description'], $recette, $_POST['categorie'], $nomImg);

                    // Mise a jour des ingrédients
                    // Suppression de tous les ingrédients que compose le plat que l'on souhaite mettre a jour
                    deleteIngredients($idPlat);
                    // On ajoute les nouveaux ingrédients un par un
                    for($i = 0; $i < count($_POST['ingredient']); $i++){
                        addIngredient($idPlat, $_POST['ingredient'][$i], $_POST['quantite'][$i], $_POST['unite'][$i]);
                    }
                }
                else{
                    // On récupère le dernier ID de plat et on lui ajoute 1 pour en créer un nouveau
                    $idPlat = getMaxIdPlat() + 1;
                    // La recette du plat soumise en candidature
                    $recette = reecriture_recette($_POST['recette']);
                    // Nom de l'image du plat qu'on a soumise en candidature
                    $nomImg = ajoutImg($_FILES['image'],$idPlat);
                    // Ajout du plat soumis en candidature
                    addPlat($idPlat, $event['IdEvenement'], $_SESSION['id'], $_POST['description'], $recette, date('Y-m-d'), $nomImg, $_POST['nomplat'], $_POST['categorie']);

                    // Ajout des ingrédients un par un
                    for($i = 0; $i < count($_POST['ingredient']); $i++){
                        addIngredient($idPlat, $_POST['ingredient'][$i], $_POST['quantite'][$i], $_POST['unite'][$i]);
                    }

                    // Dans le cas où on a participé à un certain nombre d'évènement
                    if (!checkAchievement($_SESSION['id'], 5)) {
                        // On obtient un succès
                        ajoutAchievement($_SESSION['id'], 5);
                    }
                }

                // On vide la variable $_POST
                unset($_POST);
                // On reload la page
                header('Location:index.php?page=evenements&id='.$event['IdEvenement']);
            }

            // Dans le cas où l'on souhaite supprimer sa candidature
            if(isset($_POST['deleteplat'])){
                // ID du plat auquel on a candidaté
                $idPlat = $userPlatEvent['IdPlatEvent'];
                // Suppression du plat soumis en candidature et par extension suppression de la candidature
                deletePlat($idPlat);
            }
        
            // Dans le cas où l'on souhaite voter pour un plat (fonctionne uniquement avec des évènements de catégorie 2)
            if(isset($_POST['voteplatid'])){
                // Dans le cas où l'on a déjà voté pour un plat
                if(haveVote($_SESSION['id'], $event['IdEvenement'])){
                    // On met a jour le vote
                    updateVote($_SESSION['id'], $_POST['voteplatid'], $event['IdEvenement']);
                }
                else{
                    // On ajoute le vote
                    addVote($_SESSION['id'], $_POST['voteplatid'], $event['IdEvenement']);
                }
            }

            // Dans le cas où l'on souhaite supprimer son vote (fonctionne uniquement avec des évènements de catégorie 2)
            if(isset($_POST['erase_vote'])){
                // On supprime le vote
                deleteVote($_SESSION['id'], $event['IdEvenement']);
            }
        }
    }
    else{
        // Renvoi sur la page 404
        header('Location:index.php?page=404');
    }
}
// Dans le cas contraire
else{
    // On met en variable l'ID du dernier évènement
    $maxIdEvent = getMaxEventId();
    // On charge la page avec l'ID récupéré plus haut
    header('Location:index.php?page=evenements&id='.$maxIdEvent);
}

//appel de la vue
require_once(PATH_VIEWS.$page.'.php');