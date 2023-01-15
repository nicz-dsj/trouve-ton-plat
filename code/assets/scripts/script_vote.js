const votemenu = document.getElementById('votemenu');
const plats = votemenu.getElementsByClassName('container_plat_event');
const effacerVote = votemenu.querySelector('#erasevotebtn');

function vote(id){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`voteplatid=${id}`);
}

function eraseVote(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("erase_vote=true");
}

for(let i = 0; i < plats.length; i++){
    plats[i].addEventListener('click', function(){
        vote(plats[i].id);
        location.reload();
    });
}

effacerVote.addEventListener('click', function(){
    eraseVote();
    location.reload();
});