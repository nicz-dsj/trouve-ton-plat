// on récupère nos éléments HTML

var button = document.getElementById("add_ingr");
var button2 = document.getElementById("minus_ingr");
let nb_select_add = 1;
var container_grid = document.getElementById("container_principal");
var savoir = document.getElementById("savoir");
var moins = document.getElementById("moins");
var descr = document.getElementById("descr");
var button_submit = document.getElementById("envoyer");

// ajouter un nouveau select quand on clique sur le bouton
button.addEventListener("click", function () {
  nb_select_moins = nb_select_add;
  // si il y a plus d'un select alors le bouton moins apparait
  if (nb_select_add > 0) {
    button2.style.display = "block";
  }
  //si il y a moins de 20 select alors on peut en ajouter
  if (nb_select_add < 20) {
    //création de nos éléments
    var div = document.createElement("div");
    var select = document.createElement("select");
    var quantite = document.createElement("input");
    var unite = document.createElement("select");

    var name_unite = "unite" + nb_select_add;
    var name_quantite = "quantite" + nb_select_add;
    var name_select = "ingr" + nb_select_add;

    nb_select_add++;

    div.classList.add("container_ingr");

    //on ajoute les attributs à unite
    unite.setAttribute("required", "true");
    unite.setAttribute("name", name_unite);
    unite.setAttribute("id", "unite-select");

    // on ajoute les attributs à select
    select.setAttribute("required", "true");
    select.setAttribute("name", name_select);
    select.classList.add(".input_ingr");
    select.setAttribute("id", "ingr-select");

    // on ajoute les attributs à quantite
    quantite.setAttribute("type", "number");
    quantite.setAttribute("name", name_quantite);
    quantite.setAttribute("placeholder", "Quantité");
    quantite.setAttribute("required", "true");
    quantite.setAttribute("id", "quantite");

    //recupere tous les ingrédients
    var options = document.getElementById("ingr-select").children;
    var options2 = document.getElementById("unite-select").children;

    //pour chaque ingrédient, on crée une option
    for (var i = 0; i < options.length; i++) {
      var option = document.createElement("option");
      option.setAttribute("value", options[i].value);
      option.innerHTML = options[i].innerHTML;
      select.appendChild(option);
    }

    // pour chaque unite, on crée une option
    for (var j = 0; j < options2.length; j++) {
      var option2 = document.createElement("option");
      option2.setAttribute("value", options2[j].value);
      option2.innerHTML = options2[j].innerHTML;
      unite.appendChild(option2);
    }

    // on ajoute tous nos éléments dans notre div
    div.appendChild(select);
    div.appendChild(quantite);
    div.appendChild(unite);

    //on ajoute notre div dans la page au bon endroit
    document.getElementById("container_principal").appendChild(div);

    //redéfinit le nombre de select dans un element HTML pour le récupérer en PHP éfficacement
    document.getElementById("variable_js").value = nb_select_add;

    // si il y a 20 select alors le bouton plus disparait
    if (nb_select_add == 20) {
      button.style.display = "none";
    }
  }

  // stylisation selon le nombre de select
  if (nb_select_add == 2) {
    container_grid.style.gridTemplateColumns = "1fr 1fr";
  }
  if (nb_select_add == 3) {
    container_grid.style.gridTemplateColumns = "1fr 1fr 1fr";
  }
  if (nb_select_add == 4) {
    container_grid.style.gridTemplateColumns = "1fr 1fr 1fr 1fr";
  }
});

button2.addEventListener("click", function () {
  // on supprime la derniere div ajouté
  if (nb_select_add - 1 > 0) {
    nb_select_add--;
    document.getElementById("container_principal").lastChild.remove();
  }

  //stylisation selon le nombre de select présent
  if (nb_select_add == 1) {
    button2.style.display = "none";
    container_grid.style.gridTemplateColumns = "1fr";
  }
  if (nb_select_add == 2) {
    container_grid.style.gridTemplateColumns = "1fr 1fr";
  }
  if (nb_select_add == 3) {
    container_grid.style.gridTemplateColumns = "1fr 1fr 1fr";
  }
  if (nb_select_add == 4) {
    container_grid.style.gridTemplateColumns = "1fr 1fr 1fr 1fr";
  }
  if (nb_select_add < 20) {
    button.style.display = "block";
  }
});

savoir.addEventListener("click", function () {
  //change le content de savoir
  savoir.classList.add("savoir_plus");
  savoir.innerHTML =
    "Lors de la création d'un plat, vous avez pour obligation de renseigner la recette complète. Pour ceci, veuillez expliquer chaque étape ligne par ligne, en revenant à la ligne pour créer une nouvelle étape. Le non-respect de ces conditions nous verrons dans l'obligation de refuser votre proposition . Merci de votre compréhension.";
  moins.style.display = "block";
});
moins.addEventListener("click", function () {
  savoir.classList.remove("savoir_plus");
  savoir.innerHTML = "En savoir plus.";
  moins.style.display = "none";
});


descr.addEventListener("change", function () {
  descr = descr.value;
  nom = document.getElementById("nomPlat").value;
  if (descr == "start" && nom == "hhbbgdgdba") {
    button_submit.style.display = "none";
    // créer une guitare
    var last_input = document.getElementById("last_input");
    var guitare = document.createElement("img");
    guitare.setAttribute("src", "assets/img/guitare.png");
    guitare.setAttribute("id", "guitare");
    guitare.setAttribute("alt", "guitare");
    guitare.style.width = "50px";
    guitare.style.height = "50px";
    // ajoute la guitare
    last_input.appendChild(guitare);
    guitare.addEventListener("click", function () {
      guitare.style.display = "none";
      var audio = new Audio("assets/audio/secret.mp3");
      audio = audio.play();
      document.getElementById("nomPlat").value ="";
      document.getElementById("descr").value ="";
      button_submit.style.display = "block";
      document.getElementById("easter_egg_musique").value = 1;
    });
  }
});

