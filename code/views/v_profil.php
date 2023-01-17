<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<head>
    <link rel="stylesheet" href="<?= PATH_CSS ?>profil.css">
    <link rel="stylesheet" href="<?= PATH_CSS ?>style.css">
</head>

<div class="container_profil">
    <div class="container_informations">
        <div class="user">
            <img id="avatar" src="./assets/img/avatars/<?= $utilisateur[0]['avatar'] ?>.png" width="150" height="150">
            <div class="text">
                <p id="username"><?= $utilisateur[0]['pseudoUtilisateur'] ?></p>
                <?php
                    if($utilisateur[0]['statutBan'] == 1){ ?>
                <p class="banmessage">Cet utilisateur est banni</p>
                    <?php
                    }
                ?>
                <p id="datejoin" style="margin-bottom:5px">A rejoint le : <?= date("d/m/Y",strtotime($utilisateur[0]['dateCreation'])) ?></p>
                <?php
                    if((isset($_SESSION['logged']) && $_SESSION['logged'] == 1) && (isset($_SESSION['id']) && $_SESSION['id'] == $utilisateur[0]['idUtilisateur'])){ ?>
                <p id="mail">Adresse mail : <?= $utilisateur[0]['mail'] ?> </a> <?php
                    }
                ?>
            </div>
        </div>
        <div class="preferences">
            <p class="title">Préférences</p>
            <p style="font-weight: bold;">- Catégories : </p>
            <p class="list" id="pref_categorie">
                <?php
                    if(count($prefCategorie) == 0){
                        echo 'Aucune préférence';
                    }
                    else{
                        for($i = 0; $i < count($prefCategorie); $i++){
                            if($i < count($prefCategorie) - 1){
                                echo $prefCategorie[$i]['Nom'].", ";
                            }
                            else{
                                echo $prefCategorie[3]['Nom'];
                            }
                        }
                    }
                ?>
            </p>
            <p style="font-weight: bold;">- Ingrédients : </p>
            <p class="list" id="pref_ingredients">
                <?php
                    if(count($prefIngredients) == 0){
                        echo 'Aucune préférence';
                    }
                    else{
                        for($i = 0; $i < count($prefIngredients); $i++){
                            if($i < count($prefIngredients) - 1){
                                echo $prefIngredients[$i]['Nom'].", ";
                            }
                            else{
                                echo $prefIngredients[$i]['Nom'];
                            }
                        }
                    }
                ?>
            </p>
        </div>
    </div>
    <?php
        if((isset($_SESSION['logged']) && $_SESSION['logged'] == 1) && (isset($_SESSION['id']) && $_SESSION['id'] == $utilisateur[0]['idUtilisateur'])){ ?>
    <a href="index.php?page=modifierprofil" id="editprofile">Modifier le profil</a> <?php
        }
    ?>
    <div class = "achievementsFromBd">
    <?php
    if (isset($achievementsFromBd)) {
        if (count($achievementsFromBd) > 0) {
            for ($i = 0; $i < count($achievementsFromBd); $i++) {
                ?>
                    <p style="font-weight: bold; font-size:20px;margin-bottom:2vh;">
                    <?php
                    echo $achievementsFromBd[$i][0]['nameAchiev'];
                    ?>
                    <p style= "font-size:15px;margin-bottom:2vh;">
                    <?php
                    echo $achievementsFromBd[$i][0]['descriptionAchiev'];
                    ?>
                    </p>
                <?php
            }
        }
    }
    ?>

    <div class="description">
        <p class="title">A propos :</p>
        <p class="content">
            <?= $utilisateur[0]['description'] ?>
        </p>
    </div>
    <div class="container_liste" id="favoris">
        <p class="title">Plats favoris :</p>
        <div class="liste">
        <?php
            if(count($platsFavoris) == 0){ ?>
                <div class="empty">Aucun plat favori</div>
        <?php
            }
            else{
                foreach($platsFavoris as $plat){ ?>
            <div class="container_plat" id="<?= $plat['IdPlat'] ?>">
                <img src="./assets/img/plats/<?= $plat['IdPlat'] ?>.jpg" width="200" height="200">
                <p class="nomplat"><?= $plat['Nom'] ?></p>
            </div>
        <?php
                }
            }
        ?>
        </div>
    </div>

    <div class="container_liste" id="platsajoutes">
        <p class="title">Plats ajoutés :</p>
        <div class="liste">
        <?php
            if(count($platsAjoutes) == 0){ ?>
                <div class="empty">Aucun plat ajouté</div>
        <?php
            }
            else{
                foreach($platsAjoutes as $plat){ ?>
        <div class="container_plat" id="<?= $plat['IdPlat'] ?>">
            <img src="./assets/img/plats/<?= $plat['IdPlat'] ?>.jpg" width="200" height="200">
            <p class="nomplat"><?= $plat['Nom'] ?></p>
        </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
</div>
<script src="<?= PATH_SCRIPTS?>script_hamburger.js"></script>
<script src="<?= PATH_SCRIPTS ?>script_click_plat.js"></script>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); 