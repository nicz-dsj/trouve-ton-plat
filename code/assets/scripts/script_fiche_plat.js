const id = new URLSearchParams(window.location.search).get('id');
let nom = document.getElementById('fiche_plat_nom');
let description = document.getElementById('fiche_plat_desc');
let createur = document.getElementById('fiche_plat_creat');
let categorie = document.getElementById('fiche_plat_cat');
let note = document.getElementById('fiche_plat_note');
let date = document.getElementById('fiche_plat_date');
let recette = document.getElementById('fiche_plat_recette');
let image = document.getElementById('fiche_plat_img');

const request = new XMLHttpRequest();
request.open('GET', 'http://localhost/sae-deuxieme-annee/code/index.php?page=fiche&id=' + id, true);
request.send();

request.onload = function () {
  if (request.status >= 200 && request.status < 400) {
    // Use a regular expression to extract the JSON from the response text
    const jsonStringPlat = request.responseText.match(/\{(.|\n)*\}/g)[0];
    const jsonStringUser = request.responseText.match(/\{(.|\n)*\}/g)[1];
    const dataPlat = JSON.parse(jsonStringPlat);
    const dataUser = JSON.parse(jsonStringUser);

    nom.getElementsByTagName("h1")[0].innerHTML = dataPlat.Nom;
    description.getElementsByTagName("p")[0].innerHTML = dataPlat.Description;
    categorie.getElementsByTagName("p")[0].innerHTML = dataPlat.IdCategorie;
    image.getElementsByTagName("img")[0].src = "assets/img/plats/" + dataPlat.IdPlat + ".jpg";
    createur.getElementsByTagName("h2")[0].innerHTML = dataUser.pseudoUtilisateur;
    note.getElementsByTagName("p")[0].innerHTML = dataPlat.Note;
    date.getElementsByTagName("p")[0].innerHTML = dataPlat.DatePublication;
    recette.getElementsByTagName("p")[0].innerHTML = dataPlat.recette;

  } else {
    console.error("Erreur lors de la récupération des données");
  }
};

