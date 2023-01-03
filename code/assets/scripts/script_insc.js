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
    xhr.open("GET", "?page=insc&pseudo=" + pseudo.value, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText.includes("true")) {
                    pseudo.style.backgroundColor = "rgba(255, 89, 103, 0.3)"; /*rouge transparent */
                    phraseP.innerHTML="Ce pseudo est déjà utilisé !";
                    verifInsc();
                } else {
                    pseudo.style.backgroundColor = "rgba(171, 247, 177, 0.3)"; /*vert transparent */
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
        mail.style.backgroundColor = "rgba(255, 89, 103, 0.3)"; /*rouge transparent */
        phraseM.innerHTML="Ce mail n'existe pas !";
        verifInsc();
    }
}

function mailUsed() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "?page=insc&mail=" + mail.value, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText.includes("true")) {
                    /* mail.style.backgroundColor est de couleur rouge transparante */
                    mail.style.backgroundColor = "rgba(255, 89, 103, 0.3)"; /*rouge transparent */
                    phraseM.innerHTML="Ce mail est déjà utilisé !";
                    verifInsc();
                } else {
                    mail.style.backgroundColor ="rgba(171, 247, 177, 0.3)"; /*vert transparent */
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
        pwd.style.backgroundColor = "rgba(255, 89, 103, 0.3)"; /*rouge transparent */
        phraseMo.innerHTML="Ce mot de passe est trop court !";
        verifInsc();
    }
    else{
        pwd.style.backgroundColor = "rgba(171, 247, 177, 0.3)"; /*vert transparent */
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
        pwdC.style.backgroundColor = "rgba(255, 89, 103, 0.3)"; /*rouge transparent */
        phraseMoC.innerHTML="Ce mot de passe ne correspond pas !";
        verifInsc();
    }
    else{
        pwdC.style.backgroundColor = "rgba(171, 247, 177, 0.3)"; /*vert transparent */
        phraseMoC.innerHTML="";
        verifInsc();
    }
}

function verifInsc(){
    if(pseudo.style.backgroundColor == "rgba(171, 247, 177, 0.3)" && mail.style.backgroundColor == "rgba(171, 247, 177, 0.3)" && pwd.style.backgroundColor == "rgba(171, 247, 177, 0.3)" && pwdC.style.backgroundColor == "rgba(171, 247, 177, 0.3)"){
        document.getElementsByName("inscription")[0].removeAttribute("onsubmit");
        document.getElementsByName("inscription")[0].setAttribute("action", "?page=insc");
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
