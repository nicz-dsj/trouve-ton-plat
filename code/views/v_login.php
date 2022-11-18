<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
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
            <p class='alert alert-danger'><b> Cet identifiant est inconnu !</b></p>
            <?php
        }
        else if (isset($_SESSION['logged']) && $_SESSION['logged'] == 3){
            ?>
            <p class='alert alert-danger'><b> Mot de passe incorrect !</b></p>
            <?php
        }
        ?>
        <form action="index.php?page=login" method="post">
            <div class='inline form-group'>
            
                <p><b>Identifiant</b></p>
                <p><input type = "text" name = "login"></p>
                <p><b>Mot de passe </b></p>
                <p><input type = "text" name = "password"></p>
                <p> <input class='btn btn-primary' type="submit" value="Se connecter"></p>
            </div>

        </form>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
