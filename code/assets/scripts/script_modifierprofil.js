const editpage = document.querySelector('.container_editpage');
const editAvatarBtn = document.querySelector('.avatarbtn');
const avatarPage = document.getElementById('avatarmenu');
const editPrefCategorieBtn = document.getElementsByClassName('changeprefbtn')[0];
const prefCategoriePage = document.getElementById('prefcategoriemenu');
const editPrefIngredientBtn = document.getElementsByClassName('changeprefbtn')[1];
const prefIngredientPage = document.getElementById('prefingredientmenu');
const back = document.getElementsByClassName('back');

editAvatarBtn.addEventListener('click', function(){
    avatarPage.style.display = "flex";
});

back[1].addEventListener('click', function(){
    avatarPage.style.display = "none";
});

editPrefCategorieBtn.addEventListener('click', function(){
    prefCategoriePage.style.display = "flex";
});

back[2].addEventListener('click', function(){
    prefCategoriePage.style.display = "none";
});

editPrefIngredientBtn.addEventListener('click', function(){
    prefIngredientPage.style.display = "flex";
});

back[3].addEventListener('click', function(){
    prefIngredientPage.style.display = "none";
});

/* ----------------------------------------- */

let pseudoConfirm = false, mailConfirm = false, currentPwdConfirm = false, newPwdConfirm = false, confirmPwdConfirm = false;
const regexMail = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,'g');

const login = document.getElementById('updatelogin').getElementsByTagName('input')[0];
const mail = document.getElementById('updatemail').getElementsByTagName('input')[0];
const pwd = document.getElementById('updatepwd').getElementsByTagName('input');
const loginMessage = document.getElementById('updatelogin').querySelector('.helpmessage');
const mailMessage = document.getElementById('updatemail').querySelector('.helpmessage');
const pwdMessage = document.getElementById('updatepwd').getElementsByClassName('helpmessage');
const loginSubmit = document.getElementById('updatelogin').getElementsByTagName('button')[0];
const mailSubmit = document.getElementById('updatemail').getElementsByTagName('button')[0];
const pwdSubmit = document.getElementById('updatepwd').getElementsByTagName('button')[0];

const about = document.getElementById('updateabout').getElementsByTagName('input')[0];
const aboutSubmit = document.getElementById('updateabout').getElementsByTagName('button')[0];

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

pwd[2].addEventListener('keyup', function(){
    checkNewPwd();
});

about.addEventListener('keyup', function(){
    aboutSubmit.disabled = false;
});