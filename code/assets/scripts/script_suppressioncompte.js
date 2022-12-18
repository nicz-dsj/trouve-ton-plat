let currentPwdConfirm = false, confirmPwdConfirm = false;

const pwd = document.getElementsByTagName('input');
const pwdMessage = document.getElementsByClassName('helpmessage');
const submit = document.getElementsByTagName('button')[0];

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
            verifDelete();
        }
    }
    xhr.send(`currentpwd=${pwd[0].value}`);
}

function confirmPwd(){
    if(pwd[1].value === pwd[0].value){
        pwdMessage[1].textContent = "";
        pwd[1].style.backgroundColor = "rgba(171, 247, 177, 0.3)";
        confirmPwdConfirm = true;
        verifDelete();
    }
    else{
        pwdMessage[1].textContent = "Ce mot de passe ne correspond pas !"
        pwd[1].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        confirmPwdConfirm = false;
        verifDelete();
    }
}

function verifDelete(){
    if(currentPwdConfirm && confirmPwdConfirm){
        submit.disabled = false;
    }
    else{
        submit.disabled = true;
    }
}

pwd[0].addEventListener('keyup', function(){
    if(pwd[0].value.length > 0){
        checkCurrentPwd();
        confirmPwd();
    }
    else{
        pwdMessage[0].textContent = "Veuillez saisir un mot de passe !"
        pwd[0].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        currentPwdConfirm = false;
    }
});

pwd[1].addEventListener('keyup', function(){
    confirmPwd();
});