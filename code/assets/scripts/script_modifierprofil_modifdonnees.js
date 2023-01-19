// Variables de vérification de champs
let pseudoConfirm = false, mailConfirm = false, currentPwdConfirm = false, newPwdConfirm = false, confirmPwdConfirm = false;
// Fromat de mot de passe
const regexMail = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,'g');

// Barre de modification du nom d'utilisateur
const login = document.getElementById('updatelogin').getElementsByTagName('input')[0];
// Barre de modification de l'adresse mail
const mail = document.getElementById('updatemail').getElementsByTagName('input')[0];
// Barres de modification et de vérification de mot de passe
const pwd = document.getElementById('updatepwd').getElementsByTagName('input');
// Messages d'erreurs et de succès
const loginMessage = document.getElementById('updatelogin').querySelector('.helpmessage');
const mailMessage = document.getElementById('updatemail').querySelector('.helpmessage');
const pwdMessage = document.getElementById('updatepwd').getElementsByClassName('helpmessage');
// Boutons pour soumettre les modifications
const loginSubmit = document.getElementById('updatelogin').getElementsByTagName('button')[0];
const mailSubmit = document.getElementById('updatemail').getElementsByTagName('button')[0];
const pwdSubmit = document.getElementById('updatepwd').getElementsByTagName('button')[0];

// Champ de texte de modification de la description
const about = document.getElementById('updateabout').getElementsByTagName('input')[0];
// Description actuelle
const actualAbout = about.value;

// Boutons pour soumettre les modifications
const aboutSubmit = document.getElementById('updateabout').getElementsByTagName('button')[0];

// Fonction permettant de vérifier si le nom d'utilisateur est déjà utilisé
function checkLogin(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            if(xhr.responseText.includes('true')){
                loginMessage.textContent = "Ce pseudo est déjà utilisé !"
                login.style.backgroundColor = "rgba(255, 89, 103, 0.3)";
                pseudoConfirm = false;
            }
            else{
                loginMessage.textContent = "Ce pseudo est disponible"
                login.style.backgroundColor = "rgba(171, 247, 177, 0.3)";
                pseudoConfirm = true;
            }
            verifUpdate();
        }
    }
    xhr.send(`updaterequest=true&login=${login.value}`);
}

// Fonction permettant de vérifier si l'adresse mail est déjà utilisé
function checkMail(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            if(xhr.responseText.includes('true')){
                mailMessage.textContent = "Ce mail est déjà utilisé !";
                mail.style.backgroundColor = "rgba(255, 89, 103, 0.3)";
                mailConfirm = false;
            }
            else{
                if(regexMail.test(mail.value)){
                    mailMessage.textContent = "Ce mail est disponible";
                    mail.style.backgroundColor = "rgba(171, 247, 177, 0.3)";
                    mailConfirm = true;
                }
                else{
                    mailMessage.textContent = "Ce mail n'existe pas !";
                    mail.style.backgroundColor = "rgba(255, 89, 103, 0.3)";
                    mailConfirm = false;
                }
                
            }
            verifUpdate();
        }
    }
    xhr.send(`updaterequest=true&mail=${mail.value}`);
}

// Fonction permettant de vérifier si le mot de passe correspond à celui actuel
function checkCurrentPwd(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            if(xhr.responseText.includes('true')){
                pwdMessage[0].textContent = "";
                pwd[0].style.backgroundColor = "rgba(171, 247, 177, 0.3)";
                currentPwdConfirm = true;
            }
            else{
                pwdMessage[0].textContent = "Ce mot de passe ne correspond pas !"
                pwd[0].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
                currentPwdConfirm = false;
            }
            verifUpdate();
        }
    }
    xhr.send(`updaterequest=true&currentpwd=${pwd[0].value}`);
}

// Fonction permettant de vérifier si le nouveau correspond au format attendu du mot de passe et permettant de confirmer le nouveau mot de passe
function checkNewPwd(){
    if(pwd[1].value.length < 8){
        pwdMessage[1].textContent = "Ce mot de passe est trop court !"
        pwd[1].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        newPwdConfirm = false;
        verifUpdate();
    }
    else{
        pwdMessage[1].textContent = "";
        pwd[1].style.backgroundColor = "rgba(171, 247, 177, 0.3)";
        newPwdConfirm = true;
        verifUpdate();
    }

    if(pwd[1].value === pwd[2].value){
        pwdMessage[2].textContent = ""
        pwd[2].style.backgroundColor = "rgba(171, 247, 177, 0.3)";
        confirmPwdConfirm = true;
        verifUpdate();
    }
    else{
        pwdMessage[2].textContent = "Ce mot de passe ne correspond pas !"
        pwd[2].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        confirmPwdConfirm = false;
        verifUpdate();
    }
}


// Fonction permettant de valider les vérifications
function verifUpdate(){
    if(pseudoConfirm === true){
        loginSubmit.disabled = false;
    }
    else{
        loginSubmit.disabled = true;
    }

    if(mailConfirm){
        mailSubmit.disabled = false;
    }
    else{
        mailSubmit.disabled = true;
    }

    if(currentPwdConfirm && newPwdConfirm && confirmPwdConfirm){
        pwdSubmit.disabled = false;
    }
    else{
        pwdSubmit.disabled = true;
    }
}

// Event listener sur la barre de saisie de nom d'utilisateur
login.addEventListener('keyup', function(){
    if(login.value.length > 0){
        checkLogin();
    }
    else{
        loginMessage.textContent = "Veuillez saisir un pseudo !";
        login.style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        pseudoConfirm = false;
        verifUpdate();
    }
});

// Event listener sur la barre de saisie d'adresse mail
mail.addEventListener('keyup', function(){
    if(mail.value.length > 0){
        checkMail();
    }
    else{
        mailMessage.textContent = "Veuillez saisir un mail !";
        mail.style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        mailConfirm = false;
        verifUpdate();
    }
});

// Event listener sur la première barre de saisie de mot de passe (saisie mot de passe actuel)
pwd[0].addEventListener('keyup', function(){
    if(pwd[0].value.length > 0){
        checkCurrentPwd();
    }
    else{
        pwdMessage[0].textContent = "Veuillez saisir un mot de passe !";
        pwd[0].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        currentPwdConfirm = false;
        verifUpdate();
    }
});

// Event listener sur la deuxième barre de saisie de mot de passe (saisie nouveau mot de passe)
pwd[1].addEventListener('keyup', function(){
    if(pwd[1].value.length > 0){
        checkNewPwd();
    }
    else{
        pwdMessage[1].textContent = "Veuillez saisir un mot de passe !";
        pwd[1].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        newPwdConfirm = false;
        verifUpdate();
    }
});

// Event listener sur la trosième barre de saisie de mot de passe (confirmation nouveau mot de passe)
pwd[2].addEventListener('keyup', function(){
    checkNewPwd();
});

// Event listener sur le champ de texte de modification de la description du profil utilisateur
about.addEventListener('keyup', function(){
    if(actualAbout == about.value){
        aboutSubmit.disabled = true;
    }
    else{
        aboutSubmit.disabled = false;
    }
});