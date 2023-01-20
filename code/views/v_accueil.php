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
      <br><h1> Bienvenue sur le site Trouve ton plat ! </h1>
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

    <br><br><br>
    <div id="menuMid">
      <p id="txtPub"> Besoin d'aide pour choisir vore repas ?</p>
      <a href="index.php?page=recherche" id="boutonPub"> Cliquez ici ! </a>
    </div>
    <br><br><br>


    <div id="debPromo">
      <a style="color: #fff;font-size: 20px;font-weight: 600;margin-bottom: 10px;text-align:center;" href="#promo1textBox"> ⬇️ Pour plus d'infos, c'est par là ! ⬇️</a>
    </div>
    <br><br><br>

    <div id="promo1cont">
      <div id=blur>
      <div id="promo1textBox">
        <h2 style="color:white;"> La découverte à portée de clic</h2>
        <h3 style="color:white;text-align:center;"> Avec Trouve Ton Plat, trouver des recettes n’a jamais été aussi facile.</h3>
        <br>
        <p style="color:white;width:95%;text-align:center;line-height: 125%;"> Trouve Ton Plat est un site qui vous permet de trouver des recettes de plats en fonction des ingrédients à votre disposition. 
        Tout ce que vous avez à faire, c’est de rentrer les ingrédients que vous avez dans votre frigo (ou sur vos étagères) et notre algorithme vous proposera 
        des recettes qui vous conviennent. Vous pouvez également rechercher la recette d'un plat en particulier en entrant son nom ! <br><br>
        Si cela ne vous suffit pas, vous pouvez également consulter les recettes les plus populaires, les plus récentes ou encore les recettes du jour juste au dessus ! Enfin,
        la page "Découvrir" saura ravir les plus curieux d'entre vous en vous informant sur les dernières sorties et les plats les mieux notés.
       </p>
       <br>
        <div>
          <a href="index.php?page=decouvrir" id="boutonDecou"> Je suis curieux ! </a>
          <a href="#promo2textBox" id="boutonDecou"> Dites-m'en plus !</a> 
        </div>
      </div>

    <div id="promo2textBox">
        <h2 style="color:white;"> Des nouveaux plats chaque jour !</h2>
        <h3 style="color:white;text-align:center;"> Une communauté et des administrateurs actifs.</h3>
        <br>
        <p style="color:white;width:95%;text-align:center;line-height: 125%;"> Tous les jours, les administrateurs ajoutent au moins un plat dans la base de données. Et c'est sans
        compter les plats ajoutés par d'autres utilisateurs comme vous ! Trouve Ton Plat est un site communautaire, permettant ainsi l'interaction entre divers utilisateurs, 
        notamment via le système de notation. Vous pouvez même consulter le profil de vos cuistos préférés ! <br><br>
        Vous pouvez également participer à des évènements organisés par les administrateurs, comme des concours de recettes ou prépartions de plats spéciaux. Les évènements peuvent être notés
        par les utilisateurs, mais aussi par les administrateurs ! Il faudra cependant être connecté pour participer aux évènements.
       </p>
       <br>
        <div>
          <a href="index.php?page=evenements" id="boutonDecou"> Montrez-moi ça ! </a>
          <a href="#promo3textBox" id="boutonDecou"> Dites-m'en plus !</a> 
        </div>
      </div>

      <div id="promo3textBox">
        <h2 style="color:white;text-align:center;"> Envie de partager vos recettes personnelles ?</h2>
        <h3 style="color:white;text-align:center;"> Apprenez aux utilisateurs à cuisiner vos plats fétiches !</h3>
        <br>
        <p style="color:white;width:95%;text-align:center;line-height: 125%;">
        Vous aussi, vous pouvez partager vos plats au monde entier ! Vous avez une recette de pâtes à la bolognaise ou de cookies qui vous a été transmise par votre grand-mère ?
        Partagez-la avec les autres utilisateurs ! Tout ce que vous aurez à faire, c'est de vous connecter et de créer votre recette. Enfin, il vous faudra attendre que les administrateurs
        la valident, mais cela ne devrait pas prendre trop de temps ! Attention cependant à ne pas publier de fausses recettes contenant des description malveillantes ou des quantités 
        d'ingrédients impossibles à trouver, car vous pourriez être banni du site. <br><br>
        Il ne vous reste plus qu'à vous créer un compte. Bon appétit !
       </p>
       <br>
        <div>
          <a href="index.php?page=insc" id="boutonDecou"> C'est parti !</a>
        </div>
      </div>

      <img src="assets/img/promoBG1.png" alt="Promo1" id="promo1" style="opacity:0;pointer-events: none;"/>
    </div>
    </div>



    <script src="assets/scripts/script_hamburger.js"></script>
    <script src="assets/scripts/script_accueil.js" defer></script>
    <script src="assets/scripts/script_click_plat.js" defer></script>

  </body>
</html>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
