// Corps de page
const body2 = document.getElementsByTagName('body')[0];
// Boutton permettant d'afficher le menu flottant de vote
const voteBtn = document.querySelector('.votebtn');
// Menu flottant de vote
const voteMenu = document.getElementById('votemenu');
// Boutton de retour
const back2 = voteMenu.querySelector('.back');
// Liste des plats participants
const plats = voteMenu.getElementsByClassName('container_plat_event');
// Boutton d'effacement de vote
const effacerVote = voteMenu.querySelector('#erasevotebtn');

// Permettant d'afficher le menu flottant de vote
voteBtn.addEventListener('click', function(){
    voteMenu.style.display = "flex";
    body2.style.overflowY = "hidden";
});

// Permettant de quitter le menu flottant de vote
back2.addEventListener('click', function(){
    voteMenu.style.display = "none";
    body2.style.overflowY = "scroll";
});

// Fonction permettant d'ajouter un vote
function vote(id){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`voteplatid=${id}`);
}

// Fonction permettant de supprimer le vote
function eraseVote(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("erase_vote=true");
}

// Permettant de voter le plat auquel on  a cliqué dessus
for(let i = 0; i < plats.length; i++){
    plats[i].addEventListener('click', function(){
        vote(plats[i].id);
        location.reload();
    });
}

// Permettant d'effacer le vote
effacerVote.addEventListener('click', function(){
    eraseVote();
    location.reload();
});