
<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<head>
<link rel="stylesheet" href="<?= PATH_CSS?>403_404.css">
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
<link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />
</head>

<div class="container_page">
    <div class="content">
        <h1>Erreur 404</h1>
        <p>Cette page n'existe pas<p>
    </div>
</div>
<script src="<?= PATH_SCRIPTS ?>script_hamburger.js"></script>
<?php require_once(PATH_VIEWS.'footer.php'); 