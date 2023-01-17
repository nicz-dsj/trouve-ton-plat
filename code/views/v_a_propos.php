<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<head>
<link rel="stylesheet" href="<?= PATH_CSS?>a_propos.css">
<link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />
</head>

<div class="container_page">
    <h1>Trouve Ton Plat</h1>
    <div class="champ" id="presentation">
        <h2 class="title">Présentation</h2>
        <p class="text">
        "Trouve ton plat" est un projet que nous avons réalisé à quatre dans le cadre d'un projet (situation d'apprentissage et d'évaluation) en BUS Informatique. Il comprend un site internet (sur lequel vous vous trouvez actuellement), mais également une application gérant l'administration du site (ajout de plats, gestion des événements, gestion des utilisateurs, etc.). <br /><br />
            
        Le site consiste à rechercher des recettes de plats en fonction des ingrédients que vous possédez. Ces plats sont partagés par les utilisateurs, il est donc possible de partager vous-même des plats en créant un compte et en soumettant une proposition de plat qui sera ensuite validée par un administrateur. <br /><br />
        </p>
    </div>
    <div class="champ" id="technologies">
        <h2 class="title">Technologies</h2>
        <p class="text">
        Pour les technologies utilisées, nous nous sommes basés sur nos connaissances et sur ce que l'IUT nous a enseigné. <br /><br />
Le site web est développé en HTML, CSS et JavaScript pour l'aspect visuel, et en PHP pour la relation entre la base de données et le site. L'application de gestion est quant à elle développée en Java, utilisant le framework JDBC pour permettre la relation entre l'application et la base de données. Pour ce qui est de la base de données, les informations sont stockées dans une base MySQL et est hébergée dans les serveurs d'Alwaysdata, endroit où est également hébergé le site.<br /><br />
        </p>
    </div>
    <div class="champ" id="technologies">
        <h2 class="title">En ce qui nous concerne</h2>
        <p class="text">
            Nous sommes tous les 4 étudiants en BUT Informatique à Villeurbanne, et avec la présence de notre tuteur de projet nous avons pu réaliser ce projet et vous le présenter.<br /><br /> 
        </p>
        <h3 class="subtitle">Développeurs</h3>
        <div class="liste">
            <div class="item">
                <img src="./assets/img/pfp1.jpg">
                <span class="name">Viggo CASCIANO</span>
                <p class="description">Développement du front-end et back-end du site.</p>
            </div>
            <div class="item">
                <img src="./assets/img/pfp2.jpg">
                <span class="name">Noé CHOUTEAU</span>
                <p class="description">Développement du front-end et back-end du site.</p>
            </div>
            <div class="item">
                <img src="./assets/img/pfp3.jpg">
                <span class="name">Nicolas DE SAINT JEAN</span>
                <p class="description">Développement du front-end et back-end du site.</p>
            </div>
            <div class="item">
                <img src="./assets/img/pfp4.jpg">
                <span class="name">Aro RANDRIAMANANTENA</span>
                <p class="description">Développement de l'application de gestion du site.</p>
            </div>
        </div>
        <h3 class="subtitle">Tuteur de projet</h3>
        <div class="liste">
            <div class="item">
                <img src="./assets/img/pfp5.jpg" width="128" height="128">
                <span class="name">Aude JOUBERT</span>
                <p class="description">Vérification de l'avancement du projet</p>
            </div>
        </div>
    </div>
</div>
<script src="<?= PATH_SCRIPTS ?>script_hamburger.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); 