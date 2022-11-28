<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>insc.css">    
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
</head>
<h1><b><?= TITRE_PAGE_INSCRIPTION ?></b></h1>

<!--  Fin de la page -->

        <form action="index.php?page=insc" method="post" name="inscription">
            <div class='inline form-group'>

                <div id=pseudoN>
                <p><b>Identifiant</b></p>
                <p><input type = "text" name = "pseudo" required></p>
                <span id="statut"></span>
                </div>  

                <div id=mailN>
                <p><b>Adresse mail</b></p>
                <p><input type = "email" name = "mail" required></p>
                <span id="statutM"></span>
                </div>  
                
                <div id=mdpN>
                <p><b>Mot de passe</b></p>
                <p><input type = "password" name = "pwd" required></p>
                <span id="statutMo"></span>
                </div>  
                
                <div id=mdpCN>
                <p><b>Confirmation du mot de passe</b></p>
                <p><input type = "password" name = "pwdC" required></p>
                <span id="statutMoC"></span>
                </div>  
                
                <div id=descN>
                <p><b>Description</b></p>
                <textarea id="txtDesc" maxlength=600 rows="6" cols="22" name="desc"></textarea>
                </div>
                
                <p> <input class='btn btn-primary' type="submit" value="Créer mon compte"></p>

            </div>

        </form>
        <a href="index.php?page=login"><button id="btnRetour">Retour</button></a></p>
<!--  Pied de page -->

<script src="<?= PATH_SCRIPTS?>script_insc.js"></script>
<?php require_once(PATH_VIEWS.'footer.php');

