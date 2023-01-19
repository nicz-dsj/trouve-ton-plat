// Corps de page
const body = document.getElementsByTagName('body')[0];
// Menu d'édition de page
const editpage = document.querySelector('.container_editpage');
// Boutton affichant le menu d'édition d'avatar
const editAvatarBtn = document.querySelector('.avatarbtn');
// Menu flottant d'édition d'avatar
const avatarPage = document.getElementById('avatarmenu');
// Boutton affichant le menu d'édition des préférences de catégories
const editPrefCategorieBtn = document.getElementsByClassName('changeprefbtn')[0];
// Menu flottant d'édition de préférences de catégorie
const prefCategoriePage = document.getElementById('prefcategoriemenu');
// Boutton affichant le menu d'édition des préférences d'ingrédients
const editPrefIngredientBtn = document.getElementsByClassName('changeprefbtn')[1];
// Menu flottant d'édition de préférences d'ingredients
const prefIngredientPage = document.getElementById('prefingredientmenu');
// Bouton permettant d'afficher les données enregistrées
const getDataBtn = document.getElementsByClassName('databtn')[0];
// Boutton affichant le menu de suppression de compte
const supprCompteBtn = document.getElementsByClassName('supprbtn')[0];
// Menu flottant de suppression de compte
const supprComptePage = document.getElementById('suppressionmenu');
// Bouttons de retour
const back = document.getElementsByClassName('back');

// Permettant d'afficher le menu flottant d'édition d'avatar
editAvatarBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    avatarPage.style.display = "flex";
});

// Permettant de quitter le menu flottant d'édition d'avatar
back[1].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    avatarPage.style.display = "none";
});

// Permettant d'afficher le menu flottant d'édition des préférences de catégorie
editPrefCategorieBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    prefCategoriePage.style.display = "flex";
});

// Permettant de quitter le menu flottant d'édition des préférences de catégorie
back[2].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    prefCategoriePage.style.display = "none";
});

// Permettant d'afficher le menu flottant d'édition des préférences d'ingrédients
editPrefIngredientBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    prefIngredientPage.style.display = "flex";
});

// Permettant de quitter le menu flottant d'édition des préférences d'ingrédients
back[3].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    prefIngredientPage.style.display = "none";
});

// Boutton d'affichage de la page contenant la page des données enregistrées du site
getDataBtn.addEventListener('click', function(){
    window.location.href = "index.php?page=data";
});

// Permettant d'afficher le menu flottant de suppression de compte
supprCompteBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    supprComptePage.style.display = "flex";
});

// Permettant de quitter le menu flottant de suppression de compte
back[4].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    supprComptePage.style.display = "none";
});