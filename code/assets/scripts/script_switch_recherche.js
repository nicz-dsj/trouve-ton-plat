var rech_1 = document.getElementById("container_recherche");
var rech_2 = document.getElementById("container_recherche_v2");

var button_1 = document.getElementById("b_rech");
var button_2 = document.getElementById("b_rech_2");


button_1.addEventListener('click',function(){
    rech_1.style.display="none";
    rech_2.style.display="flex";
});
button_2.addEventListener('click',function(){
    rech_2.style.display="none";
    rech_1.style.display="flex";
});