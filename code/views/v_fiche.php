<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>fiche_plat_style.css">
<script src="assets/scripts/script_hamburger.js"></script>
<script src="assets/scripts/script_fiche_plat.js" defer></script>
</head>

<!-- Fin de la page -->


<div id=bg_fiche_plat>
        <div id="fiche_plat">
            <div id="fiche_plat_img">
                <img src="" alt="">
            </div>
            <div id="fiche_plat_nom">
                <h1 id=nom>NOM</h1>
            </div>
            <div id="fiche_plat_desc">
                <p id=description>description</p>
            </div>
            <div id="fiche_plat_creat">
                <h2 id=creat>Utilisateur</h2>
            </div>
            <div id="fiche_plat_cat">
                <p id=cat>Catégorie</p>
            </div>
            <div id="fiche_plat_note">
                <p id=note>Note</p>
            </div>
            <div id="fiche_plat_date">
                <p id=date>Date</p>
            </div>
            <div id="fiche_plat_recette">
                <p id=recette>Recette</p>
            </div>

        </div>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 