var connexion = document.getElementById('connexion');
var inscription = document.getElementById('inscription');

connexion.addEventListener('click',function(){ 
    window.location = "index.php?page=login"; 
});

inscription.addEventListener('click',function(){  
    window.location = "index.php?page=insc"; 
});