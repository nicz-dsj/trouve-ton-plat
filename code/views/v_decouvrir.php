<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<head>
<link rel="stylesheet" href="<?= PATH_CSS?>decouvrir.css">
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
<link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />
</head>

<body>
    <div class="container_page">
        <h1>** Découvrir des plats **</h1>
        <?php
        // Dans le cas où on est connecté
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
            ?>
        <div class="container_item" id="preferences">
        <?php
            // Dans le cas où l'utilisateur a des préférences
            if(count($prefCategories) > 0 || count($prefIngredients) > 0){
            ?>
            <h2>🥣 Découvrez de nouveaux plats à réaliser chez vous selon vos préférences <?= $utilisateur['pseudoUtilisateur'] ?> !</h2>
            <?php
                // Dans le cas où l'utilisateur a des préférences de catégories de plats
                if(count($prefCategories) > 0){
                ?>
            <div class="container_liste" id="categorie">
                <p class="title">Selon vos préférences de catégorie</p>
                <div class="liste">
                <?php
                    // Affichage des plats selon les préférences de catégorie de plats
                    for($i = 0; $i < count($platsCategorie) && $i < 6; $i++){
                    ?>
                    <div class="container_plat" id="<?= $platsCategorie[$i]['IdPlat'] ?>">
                        <img src="./assets/img/plats/<?= $platsCategorie[$i]['IdPlat'] ?>.jpg" width="200" height="200">
                        <p class="nomplat"><?= $platsCategorie[$i]['Nom'] ?></p>
                    </div>
                    <?php
                    }
                ?>
                </div>
            </div>
                <?php
                }
                // Dans le cas où l'utilisateur a des préférences d'ingrédients
                if(count($prefIngredients) > 0){
                ?>
            <div class="container_liste" id="ingredients">
                <p class="title">Selon vos préférences d'ingrédients</p>
                <div class="liste">
                <?php
                    // Affichage des plats selon les préférences d'ingrédients
                    for($i = 0; $i < count($platsIngredients) && $i < 6; $i++){
                    ?>
                    <div class="container_plat" id="<?= $platsIngredients[$i]['IdPlat'] ?>">
                        <img src="./assets/img/plats/<?= $platsIngredients[$i]['IdPlat'] ?>.jpg" width="200" height="200">
                        <p class="nomplat"><?= $platsIngredients[$i]['Nom'] ?></p>
                    </div>
                    <?php
                    }
                ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
            <?php
            }
        ?>
            <?php
        }
        ?>
        <div class="container_item">
            <h2>🥣 Découvrez de nouveaux plats à réaliser chez vous</h2>
            <div class="container_liste" id="sorties">
                <p class="title">Dernières sorties</p>
                <div class="liste">
                <?php
                // Affichage des plats ajoutés
                for($i = 0; $i < count($plats) && $i < 6; $i++){
                    ?>
                    <div class="container_plat" id="<?= $plats[$i]['IdPlat'] ?>">
                        <img src="./assets/img/plats/<?= $plats[$i]['IdPlat'] ?>.jpg" width="200" height="200">
                        <p class="nomplat"><?= $plats[$i]['Nom'] ?></p>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
            <div class="container_liste" id="notes">
                <p class="title">Les mieux notés</p>
                <div class="liste">
                <?php
                // Affichage des plats les mieux notés
                for($i = 0; $i < count($platsMieuxNotes) && $i < 6; $i++){
                    ?>
                    <div class="container_plat" id="<?= $platsMieuxNotes[$i]['IdPlat'] ?>">
                        <img src="./assets/img/plats/<?= $platsMieuxNotes[$i]['IdPlat'] ?>.jpg" width="200" height="200">
                        <p class="nomplat"><?= $platsMieuxNotes[$i]['Nom'] ?></p>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= PATH_SCRIPTS?>script_hamburger.js"></script>
    <script src="<?= PATH_SCRIPTS ?>script_click_plat.js"></script>
</body>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 