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
<script src="assets/scripts/script_recherche.js" defer></script>

</head>
    <main>

        
    <div id="rechercheHdud">

    <div id="tagsD">

        <div class="centered"> 
            Champignon
        </div>

        <div class="centered"> 
            Champignon
        </div>

        <div class="centered"> 
            Champignon
        </div>

        <div class="centered"> 
            Champignon
        </div>


    </div>

    <div class = "container_recherche">


        <input type="text" placeholder="Inserez vos ingrédients:" list="platsLi" id="inpPlats" >
        <datalist id="platsLi">
            <?php

                foreach($ingredients as $ingredient){
                    ?>
                    <option value = "<?php echo $ingredient['Nom'] ?>"><?php echo $ingredient['Nom'] ?></option> 
                    <?php
                } 
            ?>
        </datalist>

        <button type="submit"><img src="assets/img/recherche.png"></button>
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
                    <img src="assets/img/plats/<?php echo $plat['IdPlat'] ?>.jpg" alt="Image de <?php echo $plat['Nom'] ?>">
                </div>
                <div class="container_plat_texte">
                    <h2><?php echo $plat['Nom'] ?></h2>
                </div>
            </div>
 
            <?php
        } 
        ?>

    </div>

    <form action="index.php?page=recherche" method="post" name="recherche">
        <label> Rentrez le nom de votre plat : </label>
        <input type="text" id="frecherche" name="frecherche" placeholder="Quiche, Gateau, Cookie, ..."><br>
        <input type="submit">
    </form>
    <div class="elements">
        
    </div>
    <script href="./assets/scripts/script_recherche.js"></script>
    </main>
    
</body>
</html>

