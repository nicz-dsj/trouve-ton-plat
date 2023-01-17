<?php 

require_once(PATH_MODELS.'m_evenements.php');

$categories = getCategories();
$ingredients = getIngredients();
$platVote = array();
$gagnant = array();

if(isset($_GET['id'])){
    $event = getEvent($_GET['id']);
    $nbparticipants = getNbParticipants($event[0]['IdEvenement']);
    $currentEvents = getCurrentEvents($event[0]['IdEvenement']);
    $plats = getEventPlats($event[0]['IdEvenement']);

    if(strtotime(date('Y-m-d')) > strtotime($event[0]['DateFin'])){
        $gagnant = getGagnant($event[0]['IdEvenement']);
    }

    if($event[0]['Categorie'] == 2){
        if(isset($_SESSION['id']) && haveVote($_SESSION['id'])){
            $platVote = getPlatVote($_SESSION['id']);
        }
    }

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
        if(haveParticipation($_SESSION['id'], $event[0]['IdEvenement'])){
            $userPlatEvent = getPlat($_SESSION['id'], $event[0]['IdEvenement']);
        }

        if(isset($_POST['submitplat'])){
            if(haveParticipation($_SESSION['id'], $event[0]['IdEvenement'])){
                $idPlat = $userPlatEvent[0]['IdPlatEvent'];
                $recette = reecriture_recette($_POST['recette']);
                $nomImg = ajoutImg($_FILES['image'], $idPlat);
                updatePlat($_SESSION['id'], $event[0]['IdEvenement'], $_POST['nomplat'], $_POST['description'], $recette, $_POST['categorie'], $nomImg);

                deleteIngredients($idPlat);
                for($i = 0; $i < count($_POST['ingredient']); $i++){
                    addIngredient($idPlat, $_POST['ingredient'][$i], $_POST['quantite'][$i], $_POST['unite'][$i]);
                }
            }
            else{
                $idPlat = getMaxIdPlat(1) + 1;
                $recette = reecriture_recette($_POST['recette']);
                $nomImg = ajoutImg($_FILES['image'],$idPlat);
                addPlat($event[0]['IdEvenement'], $_SESSION['id'], $_POST['description'], $recette, date('Y-m-d'), $nomImg, $idPlat, $_POST['nomplat'], $_POST['categorie']);
                for($i = 0; $i < count($_POST['ingredient']); $i++){
                    addIngredient($idPlat, $_POST['ingredient'][$i], $_POST['quantite'][$i], $_POST['unite'][$i]);
                }
            }
            unset($_POST);
            header('Location:index.php?page=evenements&id='.$event[0]['IdEvenement']);
        }

        if(isset($_POST['deleteplat'])){
            $idPlat = $userPlatEvent[0]['IdPlatEvent'];
            deletePlat($idPlat);
        }
    
        if(isset($_POST['voteplatid'])){
            if(haveVote($_SESSION['id'])){
                updateVote($_SESSION['id'], $_POST['voteplatid'], $event[0]['IdEvenement']);
            }
            else{
                addVote($_SESSION['id'], $_POST['voteplatid'], $event[0]['IdEvenement']);
            }
            header("Refresh:0");
        }

        if(isset($_POST['erase_vote'])){
            deleteVote($_SESSION['id'], $event[0]['IdEvenement']);
            header("Refresh:0");
        }
    }
    
}
else{
    $maxIdCurrentEvent = getMaxEventId();
    header('Location:index.php?page=evenements&id='.$maxIdCurrentEvent);
}




require_once(PATH_VIEWS.$page.'.php');