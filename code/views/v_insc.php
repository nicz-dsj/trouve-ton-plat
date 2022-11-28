<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>connexion_style.css"> 
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
</head>
<h1><b><?= TITRE_PAGE_INSCRIPTION ?></b></h1>

<!--  Fin de la page -->

<div class="container">
                    <div class="container_form">
                        <div class="container_form_title">
                            <div class="container_form_title_text" id="inscription">
                                <h1>Inscription</h1>
                            </div>
                            <div class="container_form_title_text" id="connexion">
                                <h1>Connexion</h1>
                            </div>
                        </div>

        <div class="container_form_content">
                <form action="index.php?page=insc" method="post" name="inscription">
                    <div class='inline form-group'>

                        <div class="container_form_content_input_inscription connexionSelected" id ="composantInscription2">
                            <label for="username">Nom d'utilisateur:</label>
                            <input type="text" name="pseudo" id="pseudo" placeholder="Nom d'utilisateur" required>
                            <span id="statut"></span>
                        </div>

                        <div class="container_form_content_input_inscription connexionSelected" id ="composantInscription">
                        <label for="email">Email:</label>
                        <input type="email" name="mail" id="email" placeholder="Email" required>
                        <span id="statutM"></span>
                        </div>  
                        
                        <div class="container_form_content_input_inscription connexionSelected" id="composantInscription3">
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="pwd" id="password" placeholder="Mot de passe" required>
                        <span id="statutMo"></span>
                        </div>
                        
                        <div class="container_form_content_input_inscription connexionSelected" id="composantInscription3">
                        <label for="password">Confirmation du mot de passe:</label>
                        <input type="password" name="pwdC" id="password" placeholder="Confirmer mot de passe" required>
                        <span id="statutMoC"></span>
                        </div>  

                        <div class="container_pre_aler">
                            <div class="container_form_content_input_inscription connexionSelected" id="composantInscription4">
                                <label for="preference">Préférence:</label>
                                <input type="preference" name="pref" id="pref" placeholder="Préférence (falcultatif)">
                            </div>
                            <div class="container_form_content_input_inscription connexionSelected" id="composantInscription5">
                                <label for="allergie">Allergie:</label>
                                <input type="allergie" name="aler" id="aler" placeholder="Allergies (falcultatif)">
                            </div>
                        </div>
                        
                        <div id=descN>
                        <p><b>Description</b></p>
                        <textarea id="txtDesc" maxlength=600 rows="6" cols="22" name="desc"></textarea>
                        </div>
                        
                        <div class="container_form_content_button_inscription connexionSelected" id="composantInscription6"> 
                            <input class='btn btn-primary' type="submit" value="Créer mon compte"></p>
                        </div>

                    </div>

                </form>
        </div>
    </div>
</div>

<!--  Pied de page -->

<script src="<?= PATH_SCRIPTS?>script_insc.js"></script>
<script src="<?= PATH_SCRIPTS?>script_connexion.js"></script>
<script src="<?= PATH_SCRIPTS?>script_hamburger.js"></script>
<?php require_once(PATH_VIEWS.'footer.php');

