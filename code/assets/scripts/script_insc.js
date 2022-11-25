var timer;                
var timerFin = 1000;

var pseudo = document.getElementsByName("pseudo")[0];
var mail = document.getElementsByName("mail")[0];
var pwd = document.getElementsByName("pwd")[0];
var pwdC = document.getElementsByName("pwdC")[0];

var phraseP = document.getElementById("statut");
var phraseM = document.getElementById("statutM");
var phraseMo = document.getElementById("statutMo");
var phraseMoC = document.getElementById("statutMoC");

const regexMail = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,'g');
const pwdValue = "";

function ecritPseudo(){
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
    xhr.open("GET", "https://iutdoua-web.univ-lyon1.fr/~p2102056/SAES3/sae-deuxieme-annee/code/index.php?page=insc&pseudo=" + pseudo.value, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText.includes("true")) {
                    pseudo.style.backgroundColor = "#ff5967";
                    phraseP.innerHTML="Ce pseudo est déjà utilisé !";
                } else {
                    pseudo.style.backgroundColor = "#abf7b1";
                    phraseP.innerHTML="Ce pseudo est disponible !";
                }
            }
        }
    }
    xhr.send();
    console.log("LETS GO");
}



function ecritMail(){
    clearTimeout(timer);
    if (document.getElementsByName("mail")[0].value) {
        timer = setTimeout(finiEcrireMail, timerFin);
    }
}

function finiEcrireMail() {
    mailConforme();
}

function mailConforme(){
    var mailValue = mail.value;
    if(regexMail.test(mailValue) == true){
        mailUsed();
    }
    else{
        mail.style.backgroundColor = "#ff5967";
        phraseM.innerHTML="Ce mail n'existe pas !";
    }
}

function mailUsed() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://iutdoua-web.univ-lyon1.fr/~p2102056/SAES3/sae-deuxieme-annee/code/index.php?page=insc&mail=" + mail.value, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText.includes("true")) {
                    mail.style.backgroundColor = "#ff5967";
                    phraseM.innerHTML="Ce mail est déjà utilisé !";
                } else {
                    mail.style.backgroundColor = "#abf7b1";
                    phraseM.innerHTML="Ce mail est disponible !";
                }
            }
        }
    }
    xhr.send();
    console.log("LETS GO");
}



function ecritMdp(){
    clearTimeout(timer);
    if (document.getElementsByName("pwd")[0].value) {
        timer = setTimeout(finiEcrireMdp, timerFin);
    }
}

function finiEcrireMdp() {
    mdpConforme();
}

function mdpConforme(){
    pwdValue = pwd.value;
    if(pwdValue.split("").length<8){
        pwd.style.backgroundColor = "#ff5967";
        phraseMo.innerHTML="Ce mot de passe est trop court !";
    }
    else{
        pwd.style.backgroundColor = "white";
        phraseMo.innerHTML="";
    }
}



function ecritMdpC(){
    clearTimeout(timer);
    if (document.getElementsByName("pwdC")[0].value) {
        timer = setTimeout(finiEcrireMdpC, timerFin);
    }
}

function finiEcrireMdpC() {
    mdpCConforme();
}

function mdpCConforme(){
    var pwdCValue = pwdC.value;
    if(pwdCValue != pwdValue){
        pwdC.style.backgroundColor = "#ff5967";
        phraseMoC.innerHTML="Ce mot de passe ne correspond pas !";
    }
    else{
        pwd.style.backgroundColor = "white";
        phraseMoC.innerHTML="";
    }
}



mail.addEventListener('keyup',ecritMail);
pseudo.addEventListener('keyup',ecritPseudo);
pwd.addEventListener('keyup',ecritMdp);
pwdC.addEventListener('keyup',ecritMdpC);
