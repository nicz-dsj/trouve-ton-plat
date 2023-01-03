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
    
    // Parse les données en JSON
    const dataPlat = JSON.parse(jsonStringPlat);
    const dataUser = JSON.parse(jsonStringUser);
    const dataCategorie = JSON.parse(jsonStringCategorie);

    // Met à jour le contenu HTML des éléments du DOM avec les données du JSON
    nom.getElementsByTagName("h1")[0].innerHTML = dataPlat.Nom;
    description.getElementsByTagName("p")[0].innerHTML = dataPlat.Description;
    categorie.getElementsByTagName("p")[0].innerHTML = dataCategorie.Nom;
    image.getElementsByTagName("img")[0].src = "assets/img/plats/" + dataPlat.IdPlat + ".jpg";
    note.getElementsByTagName("p")[0].innerHTML = dataPlat.Note;
    date.getElementsByTagName("p")[0].innerHTML = dataPlat.DatePublication;
    recette.getElementsByTagName("p")[0].innerHTML = dataPlat.recette;

    createur.getElementsByTagName("h2")[0].textContent = "Par ";
    let redirect = document.createElement('a');
    redirect.href = `index.php?page=profil&nom=${dataUser.pseudoUtilisateur}`;
    redirect.appendChild(document.createTextNode(dataUser.pseudoUtilisateur));
    console.log(redirect);
    createur.getElementsByTagName("h2")[0].appendChild(redirect);
  } else {
    // Affiche un message
    console.error("Erreur lors de la récupération des données");
  }
};

