<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>accueil_style.css">
</head>



<!--  Fin de la page -->
    <div class="container_page_banderole"></div>
      <br><h1> Bienvenue sur le site Trouve ton plat ! </h1><br>
    <div class="container_page_banderole">
      <div style="background-image: url(assets/img/plats/<?echo($platJour[0]["img"])?>);" class="banderole" id="<?echo($platJour[0]["IdPlat"])?>">
      <img src="assets/img/image_decouverte.jpg" alt="accueil" />
      </div>
      <div class ="texte_decouverte">
        <h2> Recette du jour :</h2>
        <p> <?echo($platJour[0]["Nom"])?> </p>
      </div>
    </div>
    <div class="container_page_videos">
      <div class = "video">
        <video autoplay muted loop class="video">
          <source src="assets/vid/video_cuisine.mp4">
        </video>
        <div class="texte_video">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam repellendus molestiae tenetur ad quis sunt nobis,
            similique corrupti nam id autem ipsum soluta cumque nihil eveniet, voluptatibus quidem? Fuga, eaque. Lorem ipsum dolor
           sit amet consectetur adipisicing elit. Excepturi delectus dicta quos, voluptatum in quaerat, laudantium totam culpa amet
           iusto unde rem eligendi et repellendus odit vel! Ratione, vero minus. Lorem ipsum dolor sit amet consectetur adipisicing
           elit. Pariatur, illo animi et repellendus odit vel! Ratione</p>
        </div>
      </div>
      <div class="video">
        <video autoplay muted loop class="video">
          <source src="assets/vid/video_cuisine.mp4">
        </video>
        <div class="texte_video">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam repellendus molestiae tenetur ad quis sunt nobis,
            similique corrupti nam id autem ipsum soluta cumque nihil eveniet, voluptatibus quidem? Fuga, eaque. Lorem ipsum dolor
           sit amet consectetur adipisicing elit. Excepturi delectus dicta quos, voluptatum in quaerat, laudantium totam culpa amet
           iusto unde rem eligendi et repellendus odit vel! Ratione, vero minus. Lorem ipsum dolor sit amet consectetur adipisicing
           elit. Pariatur, illo animi et repellendus odit vel! Ratione</p>
        </div>
      </div>
    </div>
    <script src="assets/scripts/script_hamburger.js"></script>
    <script src="assets/scripts/script_accueil.js"></script>
  </body>
</html>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
