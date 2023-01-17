const voteBtn = document.querySelector('.votebtn')
const voteMenu = document.getElementById('votemenu');
const back2 = voteMenu.querySelector('.back');
const plats = voteMenu.getElementsByClassName('container_plat_event');
const effacerVote = voteMenu.querySelector('#erasevotebtn');

voteBtn.addEventListener('click', function(){
    voteMenu.style.display = "flex";
    body.style.overflowY = "hidden";
});

back2.addEventListener('click', function(){
    voteMenu.style.display = "none";
    body.style.overflowY = "scroll";
});

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