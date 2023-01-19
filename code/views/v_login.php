<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>
<?php

if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
    ?>
    <p class='alert alert-success'><b> Vous êtes connecté(e)</b></p>
    <?php
}
else if (isset($_SESSION['logged']) && $_SESSION['logged'] == 2){
    ?>
    <p class='alert alert-danger'> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><b> Mauvais mail ou mot de passe!</b></p>
    <?php
    $_SESSION = array();
}
else if (isset($_SESSION['logged']) && $_SESSION['logged'] == 3){
    ?>
    <p class='alert alert-danger'> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><b> Vous devez être connecté pour pouvoir proposer un plat !</b></p>
    <?php
    $_SESSION = array();
}

?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>connexion_style.css">
</head>

<!--  Fin de la page -->

<div class="container_login">
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
            <form action="index.php?page=login" method="post">
            
                <div class="container_form_content_input_connexion" id="composantConnexion">
                    <label for="id">Identifiant</label>
                    <input type="text" name="login" placeholder="Identifiant" required>
                </div>

                <div class="container_form_content_input_connexion" id="composantConnexion2">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="password"  placeholder="Mot de passe" required>
                </div>

                <div class="container_form_content_button_connexion" id="composantConnexion3">
                    <input type="submit" value="Se connecter">
                </div>
            </form>
        </div>
        
<!--  Pied de page -->
<script src="<?= PATH_SCRIPTS?>script_connexion.js"></script>
<script src="<?= PATH_SCRIPTS?>script_hamburger.js"></script>
<?php require_once(PATH_VIEWS.'footer.php');

