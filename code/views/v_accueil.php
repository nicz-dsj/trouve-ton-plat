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

<div class="container_page_banderole">
      <img src="assets/img/image_decouverte.jpg" alt="accueil" />
      <div class ="texte_decouverte">
        <h2> Découvrez de nouvelles recettes:</h2>
        <p> Trouvez des recettes de plats à partir d'ingrédients que vous avez chez vous </p>
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
  </body>
</html>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
