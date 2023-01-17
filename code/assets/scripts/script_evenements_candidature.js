const candidatureMenu = document.getElementById('candidaturemenu');
const candidatureBtn = document.querySelector('.participate');
const back = candidatureMenu.querySelector('.back');

candidatureBtn.addEventListener('click', function(){
    candidatureMenu.style.display = "flex";
    body.style.overflowY = "hidden";
});

back.addEventListener('click', function(){
    candidatureMenu.style.display = "none";
    body.style.overflowY = "scroll";
});

const candidature = document.getElementById("candidature");
const ingredients = candidature.querySelector(".ingredients");
const buttons = candidature.querySelector('.buttons');
const ajout = document.getElementById("ajout_ingredient");
const suppr = document.getElementById("suppr_ingredient");
const supprCandidature = document.getElementById("supprcandidature");

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

supprCandidature.addEventListener('click', function(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`deleteplat=true`);
    location.reload();
});