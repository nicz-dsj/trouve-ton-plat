var timer;                
var timerFin = 500;

var pseudo = document.getElementsByName("pseudo")[0];
var mail = document.getElementsByName("mail")[0];
var pwd = document.getElementsByName("pwd")[0];
var pwdC = document.getElementsByName("pwdC")[0];

var phraseP = document.getElementById("statut");
var phraseM = document.getElementById("statutM");
var phraseMo = document.getElementById("statutMo");
var phraseMoC = document.getElementById("statutMoC");

const regexMail = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,'g');
var pwdValue = "";

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
                    verifInsc();
                } else {
                    pseudo.style.backgroundColor = "#abf7b1";
                    phraseP.innerHTML="Ce pseudo est disponible !";
                    verifInsc();
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
        verifInsc();
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
                    verifInsc();
                } else {
                    mail.style.backgroundColor = "#abf7b1";
                    phraseM.innerHTML="Ce mail est disponible !";
                    verifInsc();
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
    pwdValue = pwd.value;
    mdpConforme();
    mdpCConforme()
}

function mdpConforme(){
    if(pwdValue.split("").length<8){
        pwd.style.backgroundColor = "#ff5967";
        phraseMo.innerHTML="Ce mot de passe est trop court !";
        verifInsc();
    }
    else{
        pwd.style.backgroundColor = "white";
        phraseMo.innerHTML="";
        verifInsc();
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
        verifInsc();
    }
    else{
        pwdC.style.backgroundColor = "white";
        phraseMoC.innerHTML="";
        verifInsc();
    }
}

function verifInsc(){
    if(pseudo.style.backgroundColor == "rgb(171, 247, 177)" && mail.style.backgroundColor == "rgb(171, 247, 177)" && pwd.style.backgroundColor == "white" && pwdC.style.backgroundColor == "white"){
        document.getElementsByName("inscription")[0].removeAttribute("onsubmit");
        document.getElementsByName("inscription")[0].setAttribute("action", "index.php?page=insc");
    }
    else{
        document.getElementsByName("inscription")[0].removeAttribute("action");
        document.getElementsByName("inscription")[0].setAttribute("onsubmit", "return false");
    }
}

mail.addEventListener('keyup',ecritMail);
pseudo.addEventListener('keyup',ecritPseudo);
pwd.addEventListener('keyup',ecritMdp);
pwdC.addEventListener('keyup',ecritMdpC);
