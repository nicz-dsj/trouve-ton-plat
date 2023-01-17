<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<head>
    <link rel="stylesheet" href="<?= PATH_CSS ?>modifier_profil.css">
    <link rel="stylesheet" href="<?= PATH_CSS ?>style.css">
    <link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />
</head>

<div class="container_page">
    <div class="container_editpage">
        <a href="index.php?page=profil&id=<?= $utilisateur[0]['idUtilisateur'] ?>" class="back"> < </a>
        <div class="container_form">
            <fieldset class="item" id="item1">
                <legend class="itemtitle">Avatar</legend>
                <div class="container_editavatar">
                    <div>
                        <div id="avatar" style="background-image: url(./assets/img/avatars/<?= $utilisateur[0]['avatar'] ?>.png);"></div>
                        <div class="avatarbtn"><span>Changer l'avatar</span></div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="item" id="item2">
                <legend class="itemtitle">Informations de compte</legend>
                <form id="updatelogin" method="post" action="index.php?page=modifierprofil">
                    <div class="formelement">
                        <label class="typetitle" for="login">Pseudo : </label>
                        <div class="inputwithbtn">
                            <input type="text" name="login" value="<?= $utilisateur[0]['pseudoUtilisateur'] ?>">
                            <button name="updateloginsubmit" disabled> Enregistrer </button>
                        </div>
                        <span class="helpmessage"></span>
                    </div>
                </form>
                <form id="updatemail" method="post" action="index.php?page=modifierprofil">
                    <div class="formelement">
                        <label class="typetitle" for="mail">Adresse mail : </label>
                        <div class="inputwithbtn">
                            <input type="text" name="mail" value="<?= $utilisateur[0]['mail'] ?>">
                            <button name="updatemailsubmit" disabled> Enregistrer </button>
                        </div>
                        <span class="helpmessage"></span>
                    </div>
                </form>
                <form id="updatepwd" method="post" action="index.php?page=modifierprofil">
                    <div class="formelement">
                        <label class="typetitle" for="pwd">Mot de passe : </label>
                        <input type="password" name="currentpwd" placeholder="Mot de passe actuel" required>
                        <span class="helpmessage"></span>
                        <input type="password" name="newpwd" placeholder="Nouveau mot de passe" style="margin-top: 8px;" required>
                        <span class="helpmessage"></span>
                        <input type="password" name="newpwdC" placeholder="Confirmer le nouveau mot de passe" style="margin-top: 8px;" required>
                        <span class="helpmessage"></span>
                    </div>
                    <button name="updatepwdsubmit" disabled> Enregistrer les modifications </button>
                </form>
                <form id="updateabout" method="post" action="index.php?page=modifierprofil">
                    <label class="typetitle" for="about">A propos : </label>
                    <input type="textarea" name="about" value="<?= $utilisateur[0]['description'] ?>">
                    <button name="updateaboutsubmit" disabled> Enregistrer les modifications </button>
                </form>
            </fieldset>
            <fieldset class="item" id="item3">
                <legend class="itemtitle">Préférences</legend>
                <div class="container_editpreferences">
                    <button class="changeprefbtn">Changer les préférences de catégories</button>
                    <button class="changeprefbtn">Changer les préférences d'ingrédients</button>
                </div>
            </fieldset>
            <fieldset class="item" id="item4">
                <legend class="itemtitle">Compte</legend>
                <button class="databtn">Accéder aux données enregistrées</button>
                <button class="supprbtn">Fermer le compte</button>
            </fieldset>
        </div>
    </div>
    <div class="container_overmenu" id="avatarmenu">
        <div class="content">
            <button class="back"> < </button>
            <p>Choisissez un avatar : </p>
            <form method="post" action="index.php?page=modifierprofil">
                <div class="list">
                    <input type="radio" name="avatar" id="avatar1" value="avatar1" <?= $utilisateur[0]['avatar'] == "avatar1" ? "checked" : ""?>><label for="avatar1"></label>
                    <input type="radio" name="avatar" id="avatar2" value="avatar2" <?= $utilisateur[0]['avatar'] == "avatar2" ? "checked" : ""?>><label for="avatar2"></label>
                    <input type="radio" name="avatar" id="avatar3" value="avatar3" <?= $utilisateur[0]['avatar'] == "avatar3" ? "checked" : ""?>><label for="avatar3"></label>
                    <input type="radio" name="avatar" id="avatar4" value="avatar4" <?= $utilisateur[0]['avatar'] == "avatar4" ? "checked" : ""?>><label for="avatar4"></label>
                    <input type="radio" name="avatar" id="avatar5" value="avatar5" <?= $utilisateur[0]['avatar'] == "avatar5" ? "checked" : ""?>><label for="avatar5"></label>
                    <input type="radio" name="avatar" id="avatar6" value="avatar6" <?= $utilisateur[0]['avatar'] == "avatar6" ? "checked" : ""?>><label for="avatar6"></label>
                    <input type="radio" name="avatar" id="avatar7" value="avatar7" <?= $utilisateur[0]['avatar'] == "avatar7" ? "checked" : ""?>><label for="avatar7"></label>
                    <input type="radio" name="avatar" id="avatar8" value="avatar8" <?= $utilisateur[0]['avatar'] == "avatar8" ? "checked" : ""?>><label for="avatar8"></label>
                </div>
                <button name="avatarsubmit">Changer l'avatar</button>
            </form>
        </div>
    </div>
    <div class="container_overmenu" id="prefcategoriemenu">
        <div class="content">
            <button class="back"> < </button>
            <p>Selectionnez les catégories : </p>
            <form method="post" action="index.php?page=modifierprofil">
                <div class="list">
                    <?php
                        foreach($categories as $categorie){ ?>
                    <div class="checkboxelement">
                        <input type="checkbox" name="prefcategorie[]" value="<?= $categorie['IdCategorie'] ?>" 
                    <?php
                            foreach($prefCategorie as $pref){
                                if($pref['Nom'] == $categorie['Nom']){
                                    echo 'checked';
                                    break;
                                }
                            } 
                    ?>
                        >
                        <label for="<?= $categorie['IdCategorie'] ?>"><?= $categorie['Nom'] ?></label>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <button name="prefcategoriesubmit">Sauvegarder les modifications</button>
            </form>
        </div>
    </div>
    <div class="container_overmenu" id="prefingredientmenu">
        <div class="content">
            <button class="back"> < </button>
            <p>Selectionnez les ingrédients : </p>
            <form method="post" action="index.php?page=modifierprofil">
                <div class="list">
                    <?php
                        foreach($ingredients as $ingredient){ ?>
                    <div class="checkboxelement">
                        <input type="checkbox" name="prefingredient[]" value="<?= $ingredient['IdIngredient'] ?>" 
                    <?php
                            foreach($prefIngredients as $pref){
                                if($pref['Nom'] == $ingredient['Nom']){
                                    echo 'checked';
                                    break;
                                }
                            } 
                    ?>
                        >
                        <label for="<?= $ingredient['IdIngredient'] ?>"><?= $ingredient['Nom'] ?></label>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <button name="prefingredientsubmit">Sauvegarder les modifications</button>
            </form>
        </div>
    </div>
    <div class="container_overmenu" id="suppressionmenu">
        <div class="content">
            <button class="back"> < </button>
            <p>Fermer le compte : </p>
            <form method="post" action="index.php?page=modifierprofil">
                <input type="password" name="currentpwd" placeholder="Mot de passe actuel">
                <span class="helpmessage"></span>
                <input type="password" name="currentpwd" placeholder="Confirmer le mot de passe">
                <span class="helpmessage"></span>
                <button type="submit" name="deletesubmit" disabled>Fermer le compte</button>
            </form>
        </div>
    </div>
</div>
<script src="./assets/scripts/script_modifierprofil_page.js"></script>
<script src="./assets/scripts/script_modifierprofil_modifdonnees.js"></script>
<script src="./assets/scripts/script_modifierprofil_supprcompte.js"></script>
<script src="<?= PATH_SCRIPTS ?>script_hamburger.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); 