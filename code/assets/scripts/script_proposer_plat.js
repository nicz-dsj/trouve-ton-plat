var button = document.getElementById("add_ingr");

// ajouter un nouveau select quand on clique sur le bouton
button.addEventListener("click", function() {
    var select = document.createElement("select");
    select.setAttribute("name", "ingr");
    //recupere tous les ingrédients
    var options = document.getElementById("ingr-select").children;
    //pour chaque ingrédient, on crée une option
    for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.setAttribute("value", options[i].value);
        option.innerHTML = options[i].innerHTML;
        select.appendChild(option);
        console.log(option);
    }
    //on ajoute le select à la page avant le bouton
    document.getElementById("add_ingr").before(select);
});