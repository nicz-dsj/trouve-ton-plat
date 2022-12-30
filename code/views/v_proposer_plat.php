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

                        <div class="input">
                        <label for = "text">Description:</label>
                        <input type="text" name="descr" id="descr" placeholder="Description" required>
                        <span id="statutDescr"></span>
                        </div>  
                        
                        <div class="input">
                        <label for="text">Catégorie:</label>
                        <input type="text" name="cat" id="categorie" placeholder="c'est un chiffre ici jsp pourquoi" required>
                        <span id="statutCat"></span>
                        </div>
                        
                        <div class="input">
                        <label for="texte">Recette:</label>
                        <input type="text" name="recette" id="recette" placeholder="Recette" required>
                        <span id="statutRec"></span>
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