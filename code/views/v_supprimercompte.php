<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<head>
    <link rel="stylesheet" href="<?= PATH_CSS ?>supprimer_compte.css">
    <link rel="stylesheet" href="<?= PATH_CSS ?>style.css">
</head>

<div class="container_page">
    <div class="content">
        <a class="back" href="index.php?page=modifierprofil&nom=<?= $utilisateur[0]['pseudoUtilisateur']?>"> < </a>
        <h1>Fermer le compte</h1>
        <p>Veuillez saisir votre mot de passe pour confirmer la fermeture de votre compte</p>
        <form method="post" action="index.php?page=supprimercompte&nom=<?= $utilisateur[0]['pseudoUtilisateur']?>">
            <input type="password" name="currentpwd" placeholder="Mot de passe actuel">
            <span class="helpmessage"></span>
            <input type="password" name="currentpwd" placeholder="Confirmer le mot de passe">
            <span class="helpmessage"></span>
            <button name="submit" disabled>Fermer le compte</button>
        </form>
    </div>
</div>
<script src="<?= PATH_SCRIPTS?>script_hamburger.js"></script>
<script src="<?= PATH_SCRIPTS?>script_suppressioncompte.js"></script>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); 