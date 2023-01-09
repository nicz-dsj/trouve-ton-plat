var button = document.getElementById("add_ingr");
var envoyer = document.getElementById("envoyer");
let nb_select_add = 1;
// ajouter un nouveau select quand on clique sur le bouton
button.addEventListener("click", function() {
    var select = document.createElement("select");
    //créer un input nombre 
    var quantite = document.createElement("input");
    var name_quantite= "quantite" + nb_select_add;
    var name_select= "ingr" + nb_select_add;
    nb_select_add++;
    select.setAttribute("required", "true");
    select.setAttribute("name", name_select);
    select.classList.add(".input_ingr")
    quantite.setAttribute("type", "number");
    quantite.setAttribute("name", name_quantite);
    quantite.setAttribute("min", "1");
    quantite.setAttribute("placeholder", "quantité");
    quantite.setAttribute("required", "true");
    //recupere tous les ingrédients
    var options = document.getElementById("ingr-select").children;
    //pour chaque ingrédient, on crée une option
    for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.setAttribute("value", options[i].value);
        option.innerHTML = options[i].innerHTML;
        select.appendChild(option);
    }
    //on ajoute le select à la page avant le bouton
    document.getElementById("add_ingr").before(select);
    document.getElementById("add_ingr").before(quantite);
    document.getElementById('variable_js').value=nb_select_add;
});

