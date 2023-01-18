<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>accueil_style.css">
<link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />
</head>



<!--  Fin de la page -->
    <div class="container_page_banderole"></div>
      <br><h1> Bienvenue sur le site Trouve ton plat ! </h1><br>
    <div class="container_page_banderole">

      <div id="line1"> </div>
      <div id="line2"> </div>
      <div id="line3"> </div>
      <div id="line4"> </div>
      <div id="line5"> </div>
      <div id="line6"> </div>
      <div id="carousselImages">
        <div id="gaucheCont">
          <img src="assets/img/flecheGauche.png"></img>
        </div>
        <div id="imgCont">
          <img src="assets/img/plats/<?php echo($platJour[0]['img'])?>" alt="Image_Plat_Du_Jour" id="<?php echo($platJour[0]['IdPlat'])?>" class="platJIMG"/>
        </div>
        <div id="imgCont2">
          <img src="assets/img/aleat" alt="Plat_Aleat" class="platJIMG"/>
        </div>
        <div id="imgCont3">
          <img src="assets/img/plats/<?php echo($platPop[0]['img'])?>" alt="Plat_populaire" id="<?php echo($platPop[0]['IdPlat'])?>" class="platJIMG"/>
        </div>
        <div id="droiteCont">
          <img src="assets/img/flecheDroite.png"></img>
        </div>
      </div>

      <div class ="texte_decouverte">
        <h2> Recette du jour :</h2>
        <p> <?php echo($platJour[0]["Nom"])?> </p>
      </div>
    </div>
    <div class="container_page_videos">
      <div class = "video">
        <video autoplay muted loop class="video">
          <source src="assets/vid/video_cuisine.mp4">
        </video>
        <div class="texte_video">
          <p>Notre site vous permet de rechercher des recettes en utilisant des ingrédients spécifiques ou en entrant le nom d'un plat.</p><br><p> Vous pouvez également proposer vos propres recettes à notre communauté en soumettant votre plat pour validation par nos administrateurs.</p><br><p>
              Nous organisons régulièrement des événements communautaires dans lesquels les membres peuvent participer en préparant un plat spécifique demandé par le site. </p><br><p>C'est un excellent moyen de découvrir de nouvelles recettes et de partager vos talents culinaires avec d'autres membres de la communauté.</p>
          </div>
      </div>
      <div class="video">
        <video autoplay muted loop class="video">
          <source src="assets/vid/vid2.mp4">
        </video>
        <div class="texte_video">
          <p>Enfin, notre dernière fonctionnalité vous permet de découvrir des recettes en fonction des dernières sorties ou de vos préférences ajoutées lors de votre inscription.</p><br><p> Que vous soyez un cuisinier débutant ou expérimenté, notre site est là pour vous aider à explorer de nouvelles idées de recettes et à partager vos propres créations culinaires.</p><br><p>
              Nous espérons que vous apprécierez votre expérience sur notre site et nous attendons avec impatience de voir vos propres recettes partagées avec notre communauté. Bon appétit !</p>
        </p>
        </div>
      </div>
    </div>
    <script src="assets/scripts/script_hamburger.js"></script>
    <script src="assets/scripts/script_accueil.js"></script>
  </body>
</html>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
