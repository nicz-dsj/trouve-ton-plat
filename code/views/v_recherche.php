<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>recherche_plat_style.css">

<script src="assets/scripts/script_hamburger.js"></script>
<script src="assets/scripts/script_recherche.js" defer></script>
<script src="assets/scripts/script_switch_recherche.js" defer></script>
<script src="assets/scripts/script_click_plat.js" defer></script>

</head>
    <main>

        
    <div id="rechercheHdud">

    <div id="tagsD">

    </div>
    <div class = "container_recherche" id="container_recherche">


        <input type="text" placeholder="Insérez vos ingrédients:" list="platsLi" id="inpPlats" >
        <datalist id="platsLi">
            <?php

                foreach($ingredients as $ingredient){
                    ?>
                    <option value = "<?php echo $ingredient['Nom'] ?>"><?php echo $ingredient['Nom'] ?></option> 
                    <?php
                } 
            ?>
        </datalist>
        <button id="b_rech"><img src="assets/img/fleche_switch.png" ></button>
    </div>
    <div class = "container_recherche_v2" id = "container_recherche_v2">
        <form action="index.php?page=recherche" method="post" name="recherche">
            <input type="text" id="inpPlats" name="frecherche" placeholder="Insérez votre plat:"><br>
        </form>
        <button id="b_rech_2"><img src="assets/img/fleche_switch_2.png"></button>

        
    </div>
    </div>

    <div class="container_resultats">

        <?php

        foreach($plats as $plat){
            ?>

            <div class="container_plat" id="<?php echo $plat['IdPlat'] ?>" data-ing="<?php 

            for($j=0; $j<sizeof($liAssocHTML[$plat['IdPlat']]);$j++){
                echo($liAssocHTML[$plat['IdPlat']][$j]);
                echo "-";
            }
            
        
            ?>">

                <div class="container_plat_img">
                    <img src="assets/img/plats/<?php echo $plat['img'] ?>" alt="Image de <?php echo $plat['Nom'] ?>">
                </div>
                <div class="container_plat_texte">
                    <h2><?php echo $plat['Nom'] ?></h2>
                </div>
            </div>
 
            <?php
        } 
        ?>

    </div>

    </main>
    
</body>
</html>

