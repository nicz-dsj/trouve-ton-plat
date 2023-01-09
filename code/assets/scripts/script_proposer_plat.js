var button = document.getElementById("add_ingr");
let nb_select_add = 1;
var container_grid = document.getElementById("container_principal");

// ajouter un nouveau select quand on clique sur le bouton
button.addEventListener("click", function () {
  if (nb_select_add < 20) {
    var div = document.createElement("div");
    var select = document.createElement("select");
    var quantite = document.createElement("input");
    var unite = document.createElement("select");

    var name_unite = "unite" + nb_select_add
    var name_quantite = "quantite" + nb_select_add;
    var name_select = "ingr" + nb_select_add;

    nb_select_add++;
    
    div.classList.add("container_ingr")
    unite.setAttribute("required","true");
    unite.setAttribute("name",name_unite);
    unite.setAttribute("id","unite-select")

    select.setAttribute("required", "true");
    select.setAttribute("name", name_select);
    select.classList.add(".input_ingr");
    select.setAttribute("id","ingr-select")

    quantite.setAttribute("type", "number");
    quantite.setAttribute("name", name_quantite);
    quantite.setAttribute("placeholder", "quantité");
    quantite.setAttribute("required", "true");
    quantite.setAttribute("id","quantite");

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

    for (var j = 0; j < options2.length; j++) {
        var option2 = document.createElement("option");
        option2.setAttribute("value", options2[j].value);
        option2.innerHTML = options2[j].innerHTML;
        unite.appendChild(option2);
      }
    div.appendChild(select);
    div.appendChild(quantite);
    div.appendChild(unite);
    //on ajoute le select à la page avant le bouton
    document.getElementById("container_ingr").after(div);
    document.getElementById("variable_js").value = nb_select_add;

    if (nb_select_add ==20){
      //met en display non add_ingr
      button.style.display = "none";
    }
  }
  if(nb_select_add == 2){
    container_grid.style.gridTemplateColumns = "1fr 1fr";
  }
  if(nb_select_add == 3){
    container_grid.style.gridTemplateColumns = "1fr 1fr 1fr";
  }
  if(nb_select_add == 4){
    container_grid.style.gridTemplateColumns = "1fr 1fr 1fr 1fr";
  }
});


