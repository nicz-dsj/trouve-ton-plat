// Récupère l'ID du plat à partir de l'URL
const id = new URLSearchParams(window.location.search).get('id');

// Récupère les éléments du DOM qui vont être mis à jour
let nom = document.getElementById('fiche_plat_nom');
let description = document.getElementById('fiche_plat_desc');
let createur = document.getElementById('fiche_plat_creat');
let categorie = document.getElementById('fiche_plat_cat');
let note = document.getElementById('fiche_plat_note');
let date = document.getElementById('fiche_plat_date');
let recette = document.getElementById('fiche_plat_recette');
let image = document.getElementById('fiche_plat_img');
var noteArr = 0;
const favbutton = document.querySelector('.favbutton');

function afficherEtoiles(note) {
  // On vérifie que la note est un nombre entier compris entre 0 et 5
  if (note >= 0 && note <= 5) {
    // On crée un tableau qui contiendra les éléments HTML représentant les étoiles
    var etoiles = [];
    // On parcourt toutes les étoiles (de 0 à 4)
    if (note % 1 != 0) {
      noteArr = Math.ceil(note);
      var diff = noteArr - note;
      if (diff < 0.5) {
        note = noteArr;
        noteArr = 0;
      }
    }
    for (var i = 1; i < 6; i ++) {

      // On crée un élément span qui servira à afficher l'étoile
      var span = document.createElement('span');
      span.classList.add('etoile');
      span.setAttribute("data-value", i);

      if(noteArr != 0){
        if (i == noteArr) {
          span.classList.add('etoile-moitie-pleine');
          noteArr = 0;
        }
      }
      // Si l'indice de l'étoile est inférieur à la note, c'est une étoile pleine
      if (i < note) {
        span.classList.add('etoile-pleine');
      }
      // Sinon, si l'indice de l'étoile est égal à la note, c'est une étoile à moitié pleine
      else if (i == note) {
        span.classList.add('etoile-pleine');
      }
      // Sinon, c'est une étoile vide
      else {
        span.classList.add('etoile-vide');
      }
      // On ajoute l'événement mouseenter sur l'étoile pour qu'elle se remplisse lorsque l'utilisateur passe la souris dessus
      span.addEventListener('mouseenter', function() {
        this.classList.remove('etoile-vide');
        this.classList.remove('etoile-moitie-pleine');
        this.classList.add('etoile-pleine');
        // On parcourt toutes les étoiles précédentes pour les remplir également
        var precedentes = this.previousSibling;
        while (precedentes != null) {
          precedentes.classList.remove('etoile-vide');
          precedentes.classList.remove('etoile-moitie-pleine');
          precedentes.classList.add('etoile-pleine');
          precedentes = precedentes.previousSibling;
        }
        // On parcourt toutes les étoiles suivantes pour les vider
        var suivantes = this.nextSibling;
        while (suivantes != null) {
          suivantes.classList.remove('etoile-pleine', 'etoile-moitie-pleine');
          suivantes.classList.add('etoile-vide');
          suivantes = suivantes.nextSibling;
        }
      });
      // On ajoute l'événement mouseleave sur l'étoile pour qu'elle se vide lorsque l'utilisateur sort la souris
      span.addEventListener('mouseleave', function() {
        // On remet les étoiles dans leur état initial (pleines, à moitié pleines ou vides)
        afficherEtoiles(note);
      });

      span.addEventListener('click', function() {
        if (document.getElementsByClassName("con")[0].childElementCount > 1) {
          // Get the value of the star
          var value = this.getAttribute('data-value');
          console.log(value);

          // Send a POST request to the server
          var request = new XMLHttpRequest();
          request.open('POST', window.location.href, true);
          request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          request.send('noteNew=' + value);
          request.onload = function() {
            if (request.readyState === 4 && request.status === 200) {
              // Update the stars
              var alertElement = document.createElement("p");
              alertElement.classList.add("alert", "alert-success");

              // Create a <span> element for the close button
              var closeButton = document.createElement("span");
              closeButton.classList.add("closebtn");

              // Add an onclick event to the <span> element to hide the parent <p> element
              closeButton.onclick = function() {
                this.parentElement.style.display = "none";
              };
              closeButton.innerHTML = "&times;";
              // Create a <b> element for the text
              var text = document.createElement("b");
              text.textContent = "Note ajoutée !";
              // Append the elements
              alertElement.appendChild(closeButton);
              alertElement.appendChild(text);
              document.body.appendChild(alertElement);
            } else {
              // Show a message to the user
              console.log("Erreur lors de la soumission de la note.");
              var alertElement = document.createElement("p");
              alertElement.classList.add("alert", "alert-danger");

              // Create a <span> element for the close button
              var closeButton = document.createElement("span");
              closeButton.classList.add("closebtn");

              // Add an onclick event to the <span> element to hide the parent <p> element
              closeButton.onclick = function() {
                this.parentElement.style.display = "none";
              };
              closeButton.innerHTML = "&times;";
              // Create a <b> element for the text
              var text = document.createElement("b");
              text.textContent = "Erreur lors de la soumission de la note.";
              // Append the elements
              alertElement.appendChild(closeButton);
              alertElement.appendChild(text);
              document.body.appendChild(alertElement);
            }
          };
        } else {
          var alertElement = document.createElement("p");
          alertElement.classList.add("alert", "alert-danger");

          // Create a <span> element for the close button
          var closeButton = document.createElement("span");
          closeButton.classList.add("closebtn");

          // Add an onclick event to the <span> element to hide the parent <p> element
          closeButton.onclick = function() {
            this.parentElement.style.display = "none";
          };
          closeButton.innerHTML = "&times;";
          // Create a <b> element for the text
          var text = document.createElement("b");
          text.textContent = "Vous devez être connecté pour pouvoir noter un plat !";
          // Append the elements
          alertElement.appendChild(closeButton);
          alertElement.appendChild(text);
          document.body.appendChild(alertElement);
        }
      });

      etoiles.push(span);
    }
    // On récupère l'élément HTML qui va contenir les étoiles
    var container = document.getElementById('container-etoiles');
    // On vide le conteneur des étoiles
    container.innerHTML = '';
    // On ajoute les étoiles au conteneur
    etoiles.forEach(function(etoile) {
      container.appendChild(etoile);
    });
  }}

// Crée une nouvelle requête HTTP GET
const request = new XMLHttpRequest();

// Ouvre la requête et envoie les données
request.open('GET', '?page=fiche&id=' + id, true);
request.send();

// Définit la fonction à exécuter lorsque la réponse est reçue
request.onload = function () {
  if (request.status >= 200 && request.status < 400) {
    // Utilise une expression régulière pour extraire le JSON de la réponse
    const jsonStringPlat = request.responseText.match(/\{(.|\n)*\}/g)[0];
    const jsonStringUser = request.responseText.match(/\{(.|\n)*\}/g)[1];
    const jsonStringCategorie = request.responseText.match(/\{(.|\n)*\}/g)[2];
    const jsonStringNote = request.responseText.match(/\{(.|\n)*\}/g)[3];
    var jsonStringSim = request.responseText.match(/\{(.|\n)*\}/g)[4];
    var i = 4;
    var dataSim = [];
    while(jsonStringSim != undefined){
      i++;
      dataSim[i-5] = JSON.parse(jsonStringSim);
      jsonStringSim = request.responseText.match(/\{(.|\n)*\}/g)[i];
    }
    
    // Parse les données en JSON
    const dataPlat = JSON.parse(jsonStringPlat);
    const dataUser = JSON.parse(jsonStringUser);
    const dataCategorie = JSON.parse(jsonStringCategorie);
    const dataNote = JSON.parse(jsonStringNote);
    console.log(dataNote);
    console.log(dataPlat);
    console.log(dataSim[0]);

    // Met à jour le contenu HTML des éléments du DOM avec les données du JSON
    nom.getElementsByTagName("h1")[0].innerHTML = dataPlat.Nom;
    description.getElementsByTagName("p")[0].innerHTML = dataPlat.Description;
    categorie.getElementsByTagName("p")[0].innerHTML = "Catégorie : " + dataCategorie.Nom;
    createur.getElementsByTagName("h2")[0].innerHTML = `Par <a href=index.php?page=profil&id=${dataUser.idUtilisateur}>${dataUser.pseudoUtilisateur}</a>`;
    image.getElementsByTagName("img")[0].src = "assets/img/plats/" + dataPlat.img;
    note.getElementsByTagName("p")[0].innerHTML = dataNote.MoyenneArr+"/5";
    if(dataNote.MoyenneArr == null){
      note.getElementsByTagName("p")[0].innerHTML = "Pas encore noté";
    }
    date.getElementsByTagName("p")[0].innerHTML = dataPlat.DatePublication;
    recette.getElementsByTagName("p")[0].innerHTML = dataPlat.recette;
    afficherEtoiles(dataNote.MoyenneArr);
    const idPLAT = dataPlat.IdPlat;

     // On récupère l'élément qui contient le texte
     var texte = recette.getElementsByTagName("p")[0].innerHTML;
     // On récupère l'élément qui contiendra la liste des étapes
     var listeEtapes = document.getElementById('liste-etapes');
     // On sépare le texte en lignes
     var lignes = texte.split('\n');
     // On parcourt toutes les lignes
     lignes.forEach(function(ligne) {
      // On vérifie si la ligne commence par "ÉTAPE"
      if (ligne.startsWith('ÉTAPE')) {
        // Si c'est le cas, on sépare l'étape du texte
        var infosEtape = ligne.split(':');
        // On crée un élément de liste et on lui affecte l'étape et le texte comme contenu
        var element = document.createElement('li');
        var trait = document.createElement('div');
        console.log(trait);
        trait.classList.add("trait");
        element.innerHTML =  '<b>' + infosEtape[0] + '</b>: ' + infosEtape[1] + "<br />";
        // On ajoute l'élément à la liste des étapes
        listeEtapes.appendChild(trait);
        listeEtapes.appendChild(element);
      }
      else {
        // Si la ligne ne commence pas par "ÉTAPE", on l'ajoute au texte de l'étape précédente
        var dernierElement = listeEtapes.lastChild;
        dernierElement.innerHTML += ligne;
      }
    });
    var trait = document.createElement('div');
    trait.classList.add("trait");
    listeEtapes.appendChild(trait);
    
    for(var i = 0; i < dataSim.length; i++){
      var platSim = document.createElement('div');
      platSim.classList.add("platSim");
      var imgSim = document.createElement('img');
      imgSim.src = "assets/img/plats/" + dataSim[i].IdPlat + ".jpg";
      var nomSim = document.createElement('p');
      nomSim.innerHTML = dataSim[i].Nom;
      document.getElementById('plats_sim').appendChild(platSim);
      platSim.appendChild(imgSim);
      platSim.appendChild(nomSim);
      platSim.id = dataSim[i].IdPlat;
    }

    const plats = document.getElementsByClassName("platSim");

    //ajouter un listener pour chaque plat
    for (let i = 0; i < plats.length; i++) {
        plats[i].addEventListener('click', function () {
            //obtenir l'id du plat cliqué
            const id = plats[i].id;
            //obtenir l'url de la page
            const url = window.location.href;
            //rediriger vers la page fiche
            window.location.href = "index.php?page=fiche&id=" + id;
        });
    }


    function checkFav(){
      const xhr = new XMLHttpRequest();
      xhr.open("POST", window.location.href, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("fav=check");
      xhr.onload = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
          if(xhr.responseText.includes("favoris : oui")){
            favbutton.classList.toggle('active');
          }
        }
      }
    }
    
    favbutton.addEventListener('click', function(){
        if(favbutton.classList.contains('active')){
          const xhr = new XMLHttpRequest();
          
          xhr.open("POST", window.location.href, true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.send("fav=suppr");
          xhr.onload = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
              favbutton.classList.toggle('active');
            }
          }
        }
        else{
          const xhr = new XMLHttpRequest();
    
          xhr.open("POST", window.location.href, true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.send("fav=ajout");
          xhr.onload = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
              favbutton.classList.toggle('active');
            }
          }
        }
      });
    
      checkFav();
  } else {
    // Affiche un message
    console.error("Erreur lors de la récupération des données");
  }
};
