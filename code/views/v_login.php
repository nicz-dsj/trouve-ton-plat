<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>login.css">
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
</head>
<h1><b><?= TITRE_PAGE_LOGIN ?></b></h1>

<!--  Fin de la page -->

        <?php
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
            ?>
            <p class='alert alert-success'><b> Vous êtes connecté(e)</b></p>
            <?php
        }
        else if (isset($_SESSION['logged']) && $_SESSION['logged'] == 2){
            ?>
            <p class='alert alert-danger'><b> Mauvais mail ou mot de passe!</b></p>
            <?php
        }

        ?>
        <form action="index.php?page=login" method="post">
            <div class='inline form-group'>
            
                <p><b>Identifiant</b></p>
                <p><input type = "text" name = "login"></p>
                <p><b>Mot de passe </b></p>
                <p><input type = "password" name = "password"></p>

                <input type="checkbox" id="checkSouv" name="seSouvenir" value="Se souvenir de moi">
                <label for="seSouvenir">Se souvenir de moi ?</label>

                <p> <input class='btn btn-primary' type="submit" value="Se connecter"></p>

            </div>

        </form>
        <p> Pas encore de compte ? Inscrivez-vous ! <a href="index.php?page=insc"><button id="btnInsc">S'inscrire</button></a></p>

<!--  Pied de page -->
<script src="<?= PATH_SCRIPTS?>script_login.js"></script>
<?php require_once(PATH_VIEWS.'footer.php');

