<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>proposer_plat.css">

<script src="assets/scripts/script_hamburger.js"></script>

</head>
<main>
<div class="container_propo">
        <div class="container_form_content_propo">
                <form action="index.php?page=proposer_plat" method="post" name="proposer">
                    <div class='inline form-group'>

                        <div class="input">
                            <label for="text">Nom du plat:</label>
                            <input type="text" name="nomPlat" id="nomPlat" placeholder="Nom du plat" required>
                            <span id="statutNomPlat"></span>
                        </div>

                        <div class="input input_description">
                        <label for = "text">Description:</label>
                        <textarea type="text" name="descr" id="descr" placeholder="Description" required></textarea>
                        <span id="statutDescr"></span>
                        </div>  
                        
                        <div class="input">
                        <label for="text">Catégorie:</label>
                        <select name="cat" id="cat-select" required>
                            <?php
                                foreach($categories as $cat){
                                    ?>
                                    <option value = "<?php echo $cat['IdCategorie'] ?>"><?php echo $cat['Nom'] ?></option> 
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
                        <!-- input file-->
                        <div class="input input_file">
                        <label for="text">Image:</label>
                        <input type="file" name="img" id="image" placeholder="Image" required>
                        <span id="statutImage"></span>
                        </div>
                        
                        <div class="input"> 
                            <input class='btn btn-primary' type="submit" value="Envoyer la candidature"></p>
                        </div>

                    </div>

                </form>
        </div>
    </div>
</div>
</main>
    
</body>
</html>