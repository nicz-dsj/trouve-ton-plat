<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>plat_style.css">
<link rel="stylesheet" href="<?= PATH_CSS?>style.css">
<script src="assets/scripts/script_hamburger.js"></script>
</head>

    <main>
    <div class = "container_recherche">
        <input type="text" placeholder="Inserez vos ingrédients:">
        <button type="submit"><img src="assets/img/recherche.png"></button>
    </div>
    <div class="container_resultats">

        <div class="container_plat">
            <div class="container_plat_img">
                <img src="assets/img/pates.jpg" alt="plateau">
            </div>
            <div class="container_plat_texte">
                <h2>template_pour_aro</h2>
            </div>
        </div>

        <div class="container_plat">
            <div class="container_plat_img">
                <img src="assets/img/pates.jpg" alt="plateau">
            </div>
            <div class="container_plat_texte">
                <h2>template_pour_aro</h2>
            </div>
        </div>

        <div class="container_plat">
            <div class="container_plat_img">
                <img src="assets/img/pates.jpg" alt="plateau">
            </div>
            <div class="container_plat_texte">
                <h2>template_pour_aro</h2>
            </div>
        </div>

        <div class="container_plat">
            <div class="container_plat_img">
                <img src="assets/img/pates.jpg" alt="plateau">
            </div>
            <div class="container_plat_texte">
                <h2>template_pour_aro</h2>
            </div>
        </div>

    </div>
    </main>

</body>
</html>