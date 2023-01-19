const plats = document.getElementsByClassName("container_plat");


//ajouter un listener pour chaque plat
for (let i = 0; i < plats.length; i++) {
    console.log(plats[i].id);
    plats[i].addEventListener('click', function () {
        //obtenir l'id du plat cliqué
        const id = plats[i].id;
        //obtenir l'url de la page
        const url = window.location.href;
        //rediriger vers la page fiche
        window.location.href = "index.php?page=fiche&id=" + id;
    });
}

