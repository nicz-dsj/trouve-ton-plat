const plats = document.getElementsByClassName("container_plat");


//ajouter un listener pour chaque plat
for (let i = 0; i < plats.length; i++) {
    plats[i].addEventListener('click', function () {
        //obtenir l'id du plat cliqué
        const id = plats[i].id;
        const nom = plats[i].childNodes[3].childNodes[1].innerHTML;
        //obtenir l'url de la page
        const url = window.location.href;
        //rediriger vers la page fiche
        window.location.href = "index.php?page=fiche&id=" + id;
    });
}