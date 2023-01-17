<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<head>
<link rel="stylesheet" href="<?= PATH_CSS?>evenements.css">
</head>

<div class="container_page">
    <div class="container_event">
        <div class="event_header">
            <img class="left_side" src="./assets/img/event.jpg" width="854" height="480">
            <div class="right_side">
                <div class="event_info">
                    <h2 class="title"><?= $event[0]['NomEvenement'] ?></h2>
                    <p class="description"> <?= $event[0]['Description'] ?></p>
                    <p class="status">Actuellement <?= $nbparticipants ?> participant(s) à l'évènement</p>
                </div>
                <?php
                    if(strtotime(date('Y-m-d')) > strtotime($event[0]['DateFin'])){
                        ?>
                        <span class="message">Cet évènement est passé</span>
                        <?php
                    }
                    else{
                        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){ ?>
                            <button class="participate"><?= haveParticipation($_SESSION['id'], $event[0]['IdEvenement']) ?  "Mettre a jour la candidature" : "Participer à l'évènement" ?></button>
                        <?php
                            if($event[0]['Categorie'] == 2){ ?>
                                <button class="votebtn">Voter</button>
                            <?php
                            }
                        }
                        ?>
                    <?php
                    }
                ?>
            </div>
        </div>
        <?php
            if(count($gagnant) > 0){
                ?>
                <div class="champ" id="gagnant">
                    <h2>Gagnant de l'évènement :</h2>
                    <div id="pseudo_gagnant">
                        <a href="index.php?page=profil&id=<?= $gagnant[0]['idUtilisateur'] ?>"><?= $gagnant[0]['pseudoUtilisateur']?></a>
                    </div>
                </div>
                <?php
            }
        ?>
        <div class="champ" id="plats_participants">
            <h2>Plats participants</h2>
            <div class="container_liste">
            <?php
            if(count($plats) == 0){ ?>
                <div class="empty">Aucun plat n'a été ajouté</div>
            <?php
            }
            else{
                foreach($plats as $plat){ ?>
                <div class="container_plat_event" id="<?= $plat['IdPlatEvent'] ?>">
                    <img src="./assets/img/plats_events/<?= $plat['Img'] ?>" width="200" height="200">
                    <p class="nomplat"><?= $plat['Nom'] ?></p>
                </div>
            <?php
                }
            }
            ?>
            </div>
        </div>
        <div class="champ" id="autre_events">
            <h2>Autres évènements en cours</h2>
            <div class="container_liste">
                <?php
                    if(count($currentEvents) == 0){?>
                <div class="empty">Aucun autre évènement est en cours</div>
                <?php
                    }
                    else{
                        foreach($currentEvents as $value){?>
                        <div class="event" id="<?= $value['IdEvenement'] ?>">
                            <p><?= $value['NomEvenement'] ?></p>
                        </div>
                    <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){ ?>
    <div class="container_overmenu" id="candidaturemenu">
        <div class="content">
            <button class="back"> < </button>
            <h2><?= haveParticipation($_SESSION['id'], $event[0]['IdEvenement']) ?  "Mettre a jour la candidature" : "Participer à l'évènement" ?></h2>
            <?php
                if(haveParticipation($_SESSION['id'], $event[0]['IdEvenement'])){
                    ?>
                    <span>Vous avez candidaté avec : <?= $userPlatEvent[0]['Nom'] ?></span>
                    <button type="button" id="supprcandidature">Supprimer la candidature</button>
                    <?php
                }
            ?>
            <form id="candidature" action="index.php?page=evenements&id=<?= $event[0]['IdEvenement'] ?>" method="post" name="proposer" enctype="multipart/form-data">
                <label>Nom du plat</label>
                <input type="text" name="nomplat" id="nomplat" required>
                <label>Description</label>
                <textarea type="text" name="description" id="descriptionplat" required></textarea>
                <label>Catégorie</label>
                <select name="categorie" required>
                    <?php
                    foreach($categories as $categorie){
                        ?>
                    <option value="<?= $categorie['IdCategorie'] ?>"><?= $categorie['Nom'] ?></option>
                    <?php
                    }
                        ?>
                </select>
                <label>Recette</label>
                <textarea type="text" name="recette" id="recette" required></textarea>
                <label>Ingrédients</label>
                <div class="ingredients">
                    <select name="ingredient[]" class="select_ingredients" required>
                        <?php
                        foreach($ingredients as $ingredient){
                            ?>
                        <option value="<?= $ingredient['IdIngredient'] ?>"><?= $ingredient['Nom'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="number" name="quantite[]" class="quantite_ingredient" required>
                    <select name="unite[]" class="unite-select" required>
                        <option value="gramme">Grammes</option>
                        <option value="litres">Litres</option>
                        <option value="décilitres">Décilitres</option>
                        <option value="millilitres">Millilitres</option>
                        <option value="soupe">Cuilleres à soupe</option>
                        <option value="cafe">Cuilleres à café</option>
                        <option value="unites">Unités</option>
                    </select>
                </div>
                <div class="buttons">
                    <button type="button" id="ajout_ingredient"> + </button>
                    <button type="button" id="suppr_ingredient"> - </button>
                </div>
                <label>Image</label>
                <input type="file" name="image" id="image" required>
                <input name="submitplat" type="submit" id="envoyer" value="Soumettre">
            </form>
        </div>
    </div>
    <?php
    if($event[0]['Categorie'] == 2){ ?>
    <div class="container_overmenu" id="votemenu">
        <div class="content">
            <button class="back"> < </button>
            <h2>Voter</h2>
            <?php 
                if(count($platVote) > 0){?>
            <span>Vous avez voté : <?= $platVote[0]['Nom'] ?>
            <?php
                }
            ?>
            <div class="container_liste_plats_event">
            <?php
            if(count($plats) == 0){ ?>
                <div class="empty">Aucun plat n'a été ajouté</div>
            <?php
            }
            else{
                foreach($plats as $plat){ ?>
                <div class="container_plat_event" id="<?= $plat['IdPlatEvent'] ?>">
                    <img src="./assets/img/plats_events/<?= $plat['Img'] ?>" width="200" height="200">
                    <p class="nomplat"><?= $plat['Nom'] ?></p>
                </div>
            <?php
                }
            }
            ?>
            </div>
            <div class="erasevote">
                <button id="erasevotebtn" <?= !haveVote($_SESSION['id']) ? "disabled" : ""?>>Effacer le vote</button>
            </div>
        </div>
    </div>
    <?php
    }
        }
    ?>
</div>
<script src="./assets/scripts/script_evenements_page.js"></script>
<?php
if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){?>
<script src="./assets/scripts/script_evenements_candidature.js"></script>
<?php
    if($event[0]['Categorie'] == 2){?>
<script src="./assets/scripts/script_evenements_vote.js"></script>
<?php
    }
}
?>
<script src="<?= PATH_SCRIPTS ?>script_hamburger.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); 