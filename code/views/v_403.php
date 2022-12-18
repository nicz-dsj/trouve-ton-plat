<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<head>
<link rel="stylesheet" href="<?= PATH_CSS?>403_404.css">
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
</head>

<div class="container_page">
    <div class="content">
        <h1>Erreur 403</h1>
        <p>L'accès à cette page vous est refusé<p>
    </div>
</div>
<script src="<?= PATH_SCRIPTS ?>script_hamburger.js"></script>
<?php require_once(PATH_VIEWS.'footer.php'); 