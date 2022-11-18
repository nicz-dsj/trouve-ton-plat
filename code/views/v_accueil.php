<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<h1><?= TITRE_PAGE_ACCUEIL_TOUS ?></h1>



<!--  Fin de la page -->

<div class="image-container">
    <?php
    foreach($users as $user) {
        var_dump($user);
        ?>

        <?php
    
    
    }
    ?>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
