let currentPwdConfirm2 = false, confirmPwdConfirm2 = false;

const supprComptePage2 = document.getElementById('suppressionmenu');
const pwd2 = supprComptePage.getElementsByTagName('input');
const pwdMessage2 = supprComptePage.getElementsByClassName('helpmessage');
const submit2 = supprComptePage.getElementsByTagName('button')[1];

console.log(submit2);

function checkCurrentPwd2(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            if(xhr.responseText.includes('true')){
                pwdMessage2[0].textContent = "";
                pwd2[0].style.backgroundColor = "rgba(171, 247, 177, 0.3)";
                currentPwdConfirm2 = true;
            }
            else{
                pwdMessage2[0].textContent = "Ce mot de passe ne correspond pas !"
                pwd2[0].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
                currentPwdConfirm2 = false;
            }
            verifDelete();
        }
    }
    xhr.send(`deleterequest=true&currentpwd=${pwd2[0].value}`);
}

function confirmPwd2(){
    if(pwd2[1].value === pwd2[0].value){
        pwdMessage2[1].textContent = "";
        pwd2[1].style.backgroundColor = "rgba(171, 247, 177, 0.3)";
        confirmPwdConfirm2 = true;
        verifDelete();
    }
    else{
        pwdMessage2[1].textContent = "Ce mot de passe ne correspond pas !"
        pwd2[1].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        confirmPwdConfirm2 = false;
        verifDelete();
    }
}

function verifDelete(){
    if(currentPwdConfirm2 && confirmPwdConfirm2){
        submit2.disabled = false;
    }
    else{
        submit2.disabled = true;
    }
}

pwd2[0].addEventListener('keyup', function(){
    if(pwd2[0].value.length > 0){
        checkCurrentPwd2();
        confirmPwd2();
    }
    else{
        pwdMessage2[0].textContent = "Veuillez saisir un mot de passe !"
        pwd2[0].style.backgroundColor = "rgba(255, 89, 103, 0.3)";
        currentPwdConfirm2 = false;
    }
});

pwd2[1].addEventListener('keyup', function(){
    confirmPwd2();
});