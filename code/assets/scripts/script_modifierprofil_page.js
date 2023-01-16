const body = document.getElementsByTagName('body')[0];
const editpage = document.querySelector('.container_editpage');
const editAvatarBtn = document.querySelector('.avatarbtn');
const avatarPage = document.getElementById('avatarmenu');
const editPrefCategorieBtn = document.getElementsByClassName('changeprefbtn')[0];
const prefCategoriePage = document.getElementById('prefcategoriemenu');
const editPrefIngredientBtn = document.getElementsByClassName('changeprefbtn')[1];
const prefIngredientPage = document.getElementById('prefingredientmenu');
const getDataBtn = document.getElementsByClassName('databtn')[0];
const supprCompteBtn = document.getElementsByClassName('supprbtn')[0];
const supprComptePage = document.getElementById('suppressionmenu');
const back = document.getElementsByClassName('back');

editAvatarBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    avatarPage.style.display = "flex";
});

back[1].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    avatarPage.style.display = "none";
});

editPrefCategorieBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    prefCategoriePage.style.display = "flex";
});

back[2].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    prefCategoriePage.style.display = "none";
});

editPrefIngredientBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    prefIngredientPage.style.display = "flex";
});

back[3].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    prefIngredientPage.style.display = "none";
});

getDataBtn.addEventListener('click', function(){
    window.location.href = "index.php?page=data";
});

supprCompteBtn.addEventListener('click', function(){
    body.style.overflowY = "hidden";
    supprComptePage.style.display = "flex";
});

back[4].addEventListener('click', function(){
    body.style.overflowY = "scroll";
    supprComptePage.style.display = "none";
});