<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->

<head>
    <link rel="stylesheet" href="<?= PATH_CSS ?>proposer_plat.css">

    <script src="assets/scripts/script_hamburger.js"></script>
    <script src="assets/scripts/script_proposer_plat.js" defer></script>
    <link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />

</head>
<main>
    <div class="container_propo">
        <div class="container_form_content_propo">
            <form action="index.php?page=proposer_plat" method="post" name="proposer" enctype="multipart/form-data">
                <div class='inline form-group'>

                    <!--  Nom du plat -->
                    <div class="input">
                        <label for="text">Nom du plat:</label>
                        <input type="text" name="nomPlat" id="nomPlat" placeholder="Nom du plat" required>
                        <span id="statutNomPlat"></span>
                    </div>

                    <!--  Description du plat -->
                    <div class="input input_description">
                        <label for="text">Description:</label>
                        <textarea type="text" name="descr" id="descr" placeholder="Description" required></textarea>
                        <span id="statutDescr"></span>
                    </div>

                    <!--  Catégorie sous forme d'un selecto du plat -->
                    <div class="input">
                        <label for="text">Catégorie:</label>
                        <select name="cat" id="cat-select" required>
                            <?php
                            foreach ($categories as $cat) {
                                ?>
                                <option value="<?php echo $cat['IdCategorie'] ?>">      <!-- Récupère toutes les catégories de la BD et les mets dans le select -->
                                    <?php echo $cat['Nom'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <span id="statutCat"></span>
                    </div>

                    <!--  Recette du plat -->
                    <div class="input input_recette">
                        <label for="texte">Recette:</label>
                        <textarea type="text" name="recette" id="recette" placeholder="Recette (exemple):Mettre de l'eau à bouillir.
        Mettre les pâtes.
                        Sortir les pâtes de la casserole." required></textarea>
                        <span id="statutRec"></span>
                        <a id="savoir">En savoir plus.</a>
                        <a id="moins" style="display: none;">Moins.</a>
                    </div>

                    <!--  Ingrédients du plat -->
                    <div class="input_ingr" id="input_ingr">
                        <label for="text">Ingrédient(s):</label>
                        <div class="container_principal" id ="container_principal">
                            <div class="container_ingr" id="container_ingr">
                                <select name="ingr" id="ingr-select" required>
                                    <?php
                                    foreach ($ingredients as $ingr) {
                                        ?>
                                        <option value="<?php echo $ingr['IdIngredient'] ?>">    <!-- Récupère tous les ingrédients de la BD et les mets dans le select -->
                                            <?php echo $ingr['Nom'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input type="number" name="quantite" id="quantite" placeholder="Quantité" required>
                                <select name="unite" id="unite-select" required>        <!-- Ici, on les créer à la main car il n'y a pas d'élément unité dans la BD -->
                                    <option value="gramme">Gramme(s)</option>
                                    <option value="litres">Litre(s)</option>
                                    <option value="deci">Décilitre(s)</option>
                                    <option value="milli">Millilitre(s)</option>
                                    <option value="soupe">Cuillère(s) à soupe</option>
                                    <option value="cafe">Cuillère(s) à café</option>
                                    <option value="unite">Unité(s)</option>
                                    <option value="sachet">Sachet(s)</option>
                                    <option value="pincée">Pincée(s)</option>
                                    <option value="tranche">Tranche(s)</option>
                                    <option value="poignée">Poignée(s)</option>
                                    <option value="noix">Noix</option>

                                </select>
                                <input type="hidden" id="variable_js" name="variable_js" value="1">
                            </div>
                        </div>
                        <!-- créer un bouton pour ajouter d'autres Ingrédients -->
                        <button type="button" class="btn btn-secondary" class="btn_ajouter">
                            <img src="assets/img/add_symbole.png" alt="plus" width="20" height="20" id="add_ingr">
                        </button>
                        <!-- créer un bouton pour enlever un Ingrédient -->
                        <button type="button" class="btn btn-secondary" class="btn_moins">
                            <img src="assets/img/minus_symbole.png" alt="moins" width="20" height="20" id="minus_ingr" style="display:none;">
                        </button>
                    </div>

                    <!-- input pour mettre son image dedans -->
                    <div class="input input_file">
                        <label for="text">Image:</label>
                        <input type="file" name="image" id="image" required>
                        <span id="statutImage"></span>
                    </div>

                    <!-- le bouton submit -->
                    <div class="input last_input" id = "last_input">
                        <input class='btn btn-primary' id="envoyer" name="submit" type="submit"
                            value="Envoyer la candidature"></p>
                    </div>
                    <!-- input hidden pour recupérer cette valeur en PHP -->
                    <input type="hidden" id="easter_egg_musique" name="easter_egg_musique" value="0">

                </div>

            </form>
        </div>
    </div>
    </div>
</main>

</body>

</html>