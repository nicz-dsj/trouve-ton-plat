const body = document.getElementsByTagName('body')[0];
const overmenu = document.getElementsByClassName('container_overmenu');
const page = document.querySelector('.container_page');
const pagebuttons = page.getElementsByTagName('button');

const back = document.querySelectorAll('.back');

pagebuttons[0].addEventListener('click', function(){
    overmenu[0].style.display = "flex";
    body.style.overflowY = "hidden";
});

back[0].addEventListener('click', function(){
    overmenu[0].style.display = "none";
    body.style.overflowY = "scroll";
});

pagebuttons[1].addEventListener('click', function(){
    overmenu[1].style.display = "flex";
    body.style.overflowY = "hidden";
});


back[1].addEventListener('click', function(){
    overmenu[1].style.display = "none";
    body.style.overflowY = "scroll";
});

const candidature = document.getElementById("candidature");
const ingredients = candidature.querySelector(".ingredients");
const buttons = candidature.querySelector('.buttons');
const ajout = document.getElementById("ajout_ingredient");
const suppr = document.getElementById("suppr_ingredient");

ajout.addEventListener('click', function(){
    const nouvIngredient = ingredients.cloneNode(true);
    nouvIngredient.name = nouvIngredient.name;
    candidature.insertBefore(nouvIngredient, buttons);
});

suppr.addEventListener('click', function(){
    const allIngredients = candidature.querySelectorAll('.ingredients');
    if(allIngredients.length > 1){
        allIngredients[allIngredients.length - 1].remove();
    }
});