// Récupère les éléments HTML correspondant aux boutons de connexion et d'inscription
var connexion = document.getElementById('connexion');
var inscription = document.getElementById('inscription');

// Ajoute un gestionnaire d'événement au clic sur le bouton de connexion
connexion.addEventListener('click', function(){ 
    // Redirige vers la page de connexion
    window.location = "index.php?page=login"; 
});

// Ajoute un gestionnaire d'événement au clic sur le bouton d'inscription
inscription.addEventListener('click', function(){  
    // Redirige vers la page d'inscription
    window.location = "index.php?page=insc"; 
});