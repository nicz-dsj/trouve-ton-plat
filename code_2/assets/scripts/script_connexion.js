var connexion = document.getElementById('connexion');
var inscription = document.getElementById('inscription');

/* Connexion */
var composantConnexion = document.getElementById('composantConnexion');
var composantConnexion2 = document.getElementById('composantConnexion2');
var composantConnexion3 = document.getElementById('composantConnexion3');

/* Inscription */
var composantInscription = document.getElementById('composantInscription');
var composantInscription2 = document.getElementById('composantInscription2');
var composantInscription3 = document.getElementById('composantInscription3');
var composantInscription4 = document.getElementById('composantInscription4');
var composantInscription5 = document.getElementById('composantInscription5');
var composantInscription6 = document.getElementById('composantInscription6');

connexion.addEventListener('click',function(){ 
    connexion.classList.add('connexionSelected');
    inscription.classList.remove('inscriptionSelected');
    composantConnexion.classList.add('connexionSelected');
    composantConnexion.classList.remove('inscriptionSelected');
    composantConnexion2.classList.add('connexionSelected');
    composantConnexion2.classList.remove('inscriptionSelected');
    composantConnexion3.classList.add('connexionSelected');
    composantConnexion3.classList.remove('inscriptionSelected');
    composantInscription.classList.add('connexionSelected');
    composantInscription.classList.remove('inscriptionSelected');
    composantInscription2.classList.add('connexionSelected');
    composantInscription2.classList.remove('inscriptionSelected');
    composantInscription3.classList.add('connexionSelected');
    composantInscription3.classList.remove('inscriptionSelected');
    composantInscription4.classList.add('connexionSelected');
    composantInscription4.classList.remove('inscriptionSelected');
    composantInscription5.classList.add('connexionSelected');
    composantInscription5.classList.remove('inscriptionSelected');
    composantInscription6.classList.add('connexionSelected');
    composantInscription6.classList.remove('inscriptionSelected');
});

inscription.addEventListener('click',function(){  
    connexion.classList.remove('connexionSelected');
    inscription.classList.add('inscriptionSelected');
    composantConnexion.classList.remove('connexionSelected');
    composantConnexion.classList.add('inscriptionSelected');
    composantConnexion2.classList.remove('connexionSelected');
    composantConnexion2.classList.add('inscriptionSelected');
    composantConnexion3.classList.remove('connexionSelected');
    composantConnexion3.classList.add('inscriptionSelected');
    composantInscription.classList.remove('connexionSelected');
    composantInscription.classList.add('inscriptionSelected');
    composantInscription2.classList.remove('connexionSelected');
    composantInscription2.classList.add('inscriptionSelected');
    composantInscription3.classList.remove('connexionSelected');
    composantInscription3.classList.add('inscriptionSelected');
    composantInscription4.classList.remove('connexionSelected');
    composantInscription4.classList.add('inscriptionSelected');
    composantInscription5.classList.remove('connexionSelected');
    composantInscription5.classList.add('inscriptionSelected');
    composantInscription6.classList.remove('connexionSelected');
    composantInscription6.classList.add('inscriptionSelected'); 
});