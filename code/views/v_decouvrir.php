<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<head>
<link rel="stylesheet" href="<?= PATH_CSS?>decouvrir.css">
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
</head>

<body>
    <div class="container_page">
        <h1>** Découvrir des plats **</h1>
        <?php
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
            ?>
        <div class="container_item" id="preferences">
        <?php
            if(count($prefCategories) > 0 || count($prefIngredients) > 0){
            ?>
            <h2>🥣 Découvrez de nouveaux plats à réaliser chez vous selon vos préférences <?= $utilisateur[0]['pseudoUtilisateur'] ?> !</h2>
            <?php
                if(count($prefCategories) > 0){
                ?>
            <div class="container_liste" id="categorie">
                <p class="title">Selon vos préférences de catégorie</p>
                <div class="liste">
                <?php
                    for($i = 0; $i < count($platsCategorie) && $i < 10; $i++){
                    ?>
                    <div class="plat" id="<?= $platsCategorie[$i]['IdPlat'] ?>">
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

                if(count($prefIngredients) > 0){
                ?>
            <div class="container_liste" id="ingredients">
                <p class="title">Selon vos préférences d'ingrédients</p>
                <div class="liste">
                <?php
                    for($i = 0; $i < count($platsIngredients) && $i < 10; $i++){
                    ?>
                    <div class="plat" id="<?= $platsIngredients[$i]['IdPlat'] ?>">
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
                for($i = 0; $i < count($plats) && $i < 10; $i++){
                    ?>
                    <div class="plat" id="<?= $plats[0]['IdPlat'] ?>">
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
                for($i = 0; $i < count($platsMieuxNotes) && $i < 10; $i++){
                    ?>
                    <div class="plat" id="<?= $platsMieuxNotes[$i]['IdPlat'] ?>">
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
    <script>
        const plats = document.getElementsByClassName('plat');

        for(let i = 0; i < plats.length; i++){
            plats[i].addEventListener('click', function(){
                window.location.href = `index.php?page=fiche&id=${plats[i].id}`;
            });
        }
    </script>
</body>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 