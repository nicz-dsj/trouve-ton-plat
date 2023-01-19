// Variables de confirmations de mot de passe
let currentPwdConfirm2 = false, confirmPwdConfirm2 = false;

// Menu flottant de suppression de compte
const supprComptePage2 = document.getElementById('suppressionmenu');
// Barres de saisie de mot de passe
const pwd2 = supprComptePage.getElementsByTagName('input');
// Messages d'erreur
const pwdMessage2 = supprComptePage.getElementsByClassName('helpmessage');
// Boutton de soumission de la suppression de compte
const submit2 = supprComptePage.getElementsByTagName('button')[1];

// Fonction permettant de vérifier si le mot de passe correspond à celui actuel
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

// Fonction permettant de confirmer le mot de passe actuel
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

// Fonction permettant de valider les vérifications
function verifDelete(){
    if(currentPwdConfirm2 && confirmPwdConfirm2){
        submit2.disabled = false;
    }
    else{
        submit2.disabled = true;
    }
}

// Event listener sur la première barre de saisie de mot de passe (saisie mot de passe actuel)
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

// Event listener sur la trosième barre de saisie de mot de passe (confirmation mot de passe actuel)
pwd2[1].addEventListener('keyup', function(){
    confirmPwd2();
});