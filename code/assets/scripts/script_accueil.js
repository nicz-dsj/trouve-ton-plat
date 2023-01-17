var platJour = document.getElementsByClassName("banderole")[0];
platJour.addEventListener('click', function () {
    window.location.href = "index.php?page=fiche&id="+platJour.id;
});