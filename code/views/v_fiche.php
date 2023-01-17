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
<link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />
</head>

<!-- Fin de la page -->

<div id=bg_fiche_plat>
        <div id="fiche_plat">
            
            <div id="fiche_plat_haut">
                <div id="fiche_plat_img">
                    <img src="" alt="">
                </div>

                <div id="fiche_plat_infos">
                    <div id="fiche_plat_nom">
                        <h1 id=nom>NOM</h1>
                    </div>
                    <div id="fiche_plat_creat">
                        <h2 id=creat>Utilisateur</h2>
                    </div>
                    <div id="fiche_plat_note">
                        <div id=container-etoiles></div>
                        <p id=note>Note</p>
                    </div>
                    <div id="fiche_plat_desc">
                        <p id=description>Description</p>
                    </div>
                    <br>
                    <div id="fiche_plat_cat" style="display:none;">
                        <p id=cat>Catégorie</p>
                    </div>
                    <p id=ingredients>Ingrédients :<br></p>
                    <div id="fiche_plat_ingredients">
                        <?php for($j=0;$j<count($ingredients);$j++){ ?>
                            <p class= "ingred" id=ingr<?php echo $j ?>><?php echo $ingredients[$j]['Nom'] ?></p>
                        <?php } ?>
                    </div>
                    <?php
                    if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
                        ?>
                    <div class="favbutton"></div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div id="fiche_plat_recette">
                <p id=recette style="display:none;">Recette</p>
                <ul id=liste-etapes></ul>
            </div>

            <h3>Plats similaires :</h3>
            <div id="plats_sim">
            </div>

        </div>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 