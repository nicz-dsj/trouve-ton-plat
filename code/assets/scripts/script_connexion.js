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
    window.location = "index.php?page=login"; 
});

inscription.addEventListener('click',function(){  
    window.location = "index.php?page=insc"; 
});