const plats = document.getElementsByClassName("container_plat");


//add a click listener to all the plats
for (let i = 0; i < plats.length; i++) {
    plats[i].addEventListener('click', function () {
        //get the id of the plat
        const id = plats[i].id;
        const nom = plats[i].childNodes[3].childNodes[1].innerHTML;

        //get the url of the page
        const url = window.location.href;
        //redirect to the page with the id of the plat
        window.location.href = "index.php?page=fiche&id=" + id;
    });
}