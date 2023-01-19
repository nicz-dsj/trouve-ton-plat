var platJour = document.getElementsByClassName("platJIMG")[0];
var optAct = document.getElementById("imgCont")

platJour.addEventListener('click', function () {
    window.location.href = "index.php?page=fiche&id="+platJour.id;
});
