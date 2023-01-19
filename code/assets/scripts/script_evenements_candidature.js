// Corps de page
const body = document.getElementsByTagName('body')[0];
// Menu flottant contenant le formulaire de candidature
const candidatureMenu = document.getElementById('candidaturemenu');
// Boutton permettant d'afficher le menu flottant contenant le formulaire de candidature
const candidatureBtn = document.querySelector('.participate');
// Bouton de retour
const back = candidatureMenu.querySelector('.back');

// Permettant d'afficher le menu flottant de candidature
candidatureBtn.addEventListener('click', function(){
    candidatureMenu.style.display = "flex";
    body.style.overflowY = "hidden";
});

// Permettant de quitter le menu flottant de candidature
back.addEventListener('click', function(){
    candidatureMenu.style.display = "none";
    body.style.overflowY = "scroll";
});

// Formulaire de candidature
const candidature = document.getElementById("candidature");
// Champ de selection d'ingrédient
const ingredients = candidature.querySelector(".ingredients");
// Les bouttons d'ajout et de suppression d'ingredient
const buttons = candidature.querySelector(".buttons");
// Boutton d'ajout d'un ingrédient
const ajout = document.getElementById("ajout_ingredient");
// Boutton de suppression d'un ingredient
const suppr = document.getElementById("suppr_ingredient");

// Permettant d'ajouter nouveau un champ d'ingredient
ajout.addEventListener('click', function(){
    const allIngredients = candidature.querySelectorAll('.ingredients');
    if(allIngredients.length <= 20){
        const nouvIngredient = ingredients.cloneNode(true);
        nouvIngredient.name = nouvIngredient.name;
        candidature.insertBefore(nouvIngredient, buttons);
    }
});

// Permettant de supprimer le dernier champ d'ingredient
suppr.addEventListener('click', function(){
    const allIngredients = candidature.querySelectorAll('.ingredients');
    if(allIngredients.length > 1){
        allIngredients[allIngredients.length - 1].remove();
    }
});

// Permettant la suppression de candidature
if(document.getElementById("supprcandidature")){
    const supprCandidature = document.getElementById("supprcandidature");

    supprCandidature.addEventListener('click', function(){
        const xhr = new XMLHttpRequest();
        xhr.open("POST", window.location.href, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(`deleteplat=true`);
        location.reload();
    });
}
