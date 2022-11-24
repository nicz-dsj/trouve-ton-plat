var timer;                
var timerFin = 2000;
var pseudo = document.getElementsByName("pseudo")[0];
var mail = document.getElementsByName("mail")[0]

function ecrit(){
    clearTimeout(timer);
    if (document.getElementsByName("pseudo")[0].value) {
        timer = setTimeout(finiEcrirePseudo, timerFin);
    }
}

function finiEcrirePseudo() {
    pseudoUsed();
}

function pseudoUsed() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/index.php?page=insc?pseudo=" + pseudo.value, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText == "true") {
                    pseudo.style.backgroundColor = "red";
                } else {
                    pseudo.style.backgroundColor = "green";
                }
            }
        }
    }
    xhr.send();
}
pseudo.addEventListener('keyup',ecrit);

