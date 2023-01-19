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

    <div id="firstCont">
    <section class="carousel" aria-label="Gallery">
      <ol class="carousel__viewport">
        <li id="carousel__slide1"
            tabindex="0"
            class="carousel__slide">
          <div id=<?php echo($platJour[0]['IdPlat'])?> class="container_plat" >
            <img src="assets/img/plats/<?php echo($platJour[0]['img'])?>" alt="Image_Plat_Du_Jour" id="<?php echo($platJour[0]['IdPlat'])?>"/>
          </div>
          <div class ="texte_decouverte">
            <h2> Recette du jour :</h2>
            <p> <?php echo($platJour[0]["Nom"])?> </p>
          </div>
          <div class="carousel__snapper">
            <a href="#carousel__slide3"
              class="carousel__prev">Go to last slide</a>
            <a href="#carousel__slide2"
              class="carousel__next">Go to next slide</a>
          </div>
        </li>
        <li id="carousel__slide2"
            tabindex="0"
            class="carousel__slide">
            <div id="<?php echo($rand)?>" class="container_plat">
              <img src="assets/img/aleat.jpg" alt="Plat_Aleat" id="yeah"/>
            </div>
          <div class ="texte_decouverte">
            <h2> Plat aléatoire</h2>
          </div>
          <div class="carousel__snapper"></div>
          <a href="#carousel__slide1"
            class="carousel__prev">Go to previous slide</a>
          <a href="#carousel__slide3"
            class="carousel__next">Go to next slide</a>
        </li>
        <li id="carousel__slide3"
            tabindex="0"
            class="carousel__slide">
          <div id=<?php echo($platPop[0]['IdPlat'])?> class="container_plat">
            <img src="assets/img/plats/<?php echo($platPop[0]['img'])?>" alt="Plat_populaire" id="<?php echo($platPop[0]['IdPlat'])?>"/>
          </div>
          <div class ="texte_decouverte">
            <h2> Plat populaire :</h2>
            <p> <?php echo($platPop[0]["Nom"])?> </p>
          </div>
          <div class="carousel__snapper"></div>
          <a href="#carousel__slide2"
            class="carousel__prev">Go to previous slide</a>
          <a href="#carousel__slide1"
            class="carousel__next">Go to next slide</a>
        </li>
      </ol>
      <aside class="carousel__navigation">
        <ol class="carousel__navigation-list">
          <li class="carousel__navigation-item">
            <a href="#carousel__slide1"
              class="carousel__navigation-button">Go to slide 1</a>
          </li>
          <li class="carousel__navigation-item">
            <a href="#carousel__slide2"
              class="carousel__navigation-button">Go to slide 2</a>
          </li>
          <li class="carousel__navigation-item">
            <a href="#carousel__slide3"
              class="carousel__navigation-button">Go to slide 3</a>
          </li>
        </ol>
      </aside>
    </section>
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
    <script src="assets/scripts/script_click_plat.js" defer></script>

  </body>
</html>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
