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

</head>
<main>
    <div class="container_propo">
        <div class="container_form_content_propo">
            <form action="index.php?page=proposer_plat" method="post" name="proposer" enctype="multipart/form-data">
                <div class='inline form-group'>

                    <div class="input">
                        <label for="text">Nom du plat:</label>
                        <input type="text" name="nomPlat" id="nomPlat" placeholder="Nom du plat" required>
                        <span id="statutNomPlat"></span>
                    </div>

                    <div class="input input_description">
                        <label for="text">Description:</label>
                        <textarea type="text" name="descr" id="descr" placeholder="Description" required></textarea>
                        <span id="statutDescr"></span>
                    </div>

                    <div class="input">
                        <label for="text">Catégorie:</label>
                        <select name="cat" id="cat-select" required>
                            <?php
                            foreach ($categories as $cat) {
                                ?>
                                <option value="<?php echo $cat['IdCategorie'] ?>">
                                    <?php echo $cat['Nom'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <span id="statutCat"></span>
                    </div>

                    <div class="input input_recette">
                        <label for="texte">Recette:</label>
                        <textarea type="text" name="recette" id="recette" placeholder="Recette" required></textarea>
                        <span id="statutRec"></span>
                    </div>

                    <div class="input_ingr" id="input_ingr">
                        <label for="text">Ingrédient(s):</label>
                        <div class="container_principal" id ="container_principal">
                            <div class="container_ingr" id="container_ingr">
                                <select name="ingr" id="ingr-select" required>
                                    <?php
                                    foreach ($ingredients as $ingr) {
                                        ?>
                                        <option value="<?php echo $ingr['IdIngredient'] ?>">
                                            <?php echo $ingr['Nom'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input type="number" name="quantite" id="quantite" placeholder="Quantité" required>
                                <select name="unite" id="unite-select" required>
                                    <option value="gramme">Grammes</option>
                                    <option value="litres">Litres</option>
                                    <option value="unite">décilitres</option>
                                    <option value="unite">Millilitres</option>
                                    <option value="soupe">Cuilleres à soupe</option>
                                    <option value="cafe">Cuilleres à café</option>
                                    <option value="unite">Unité</option>
                                </select>
                                <input type="hidden" id="variable_js" name="variable_js" value="1">
                            </div>
                        </div>
                        <!-- créer un bouton pour ajouter d'autre Ingrédient -->
                        <button type="button" class="btn btn-secondary" class="btn_ajouter">
                            <img src="assets/img/add_symbole.png" alt="plus" width="20" height="20" id="add_ingr">
                        </button>
                    </div>

                    <!-- input file-->
                    <div class="input input_file">
                        <label for="text">Image:</label>
                        <input type="file" name="image" id="image" required>
                        <span id="statutImage"></span>
                    </div>

                    <div class="input last_input">
                        <input class='btn btn-primary' id="envoyer" name="submit" type="submit"
                            value="Envoyer la candidature"></p>
                    </div>

                </div>

            </form>
        </div>
    </div>
    </div>
</main>

</body>

</html>