var platJour = document.getElementsByClassName("platJIMG")[0];
var optAct = document.getElementById("imgCont")
platJour.addEventListener('click', function () {
    window.location.href = "index.php?page=fiche&id="+platJour.id;
});

var boutonG = document.getElementById("droiteCont");
boutonG.addEventListener('click', function () {
    if(optAct === document.getElementById("imgCont")){
        document.getElementById("imgCont").classList.add("milVgau");
        document.getElementById("imgCont2").style.display="block";
        document.getElementById("imgCont2").classList.add("droVmil");
        setTimeout(function(){
            document.getElementById("imgCont").classList.remove("milVgau");
            document.getElementById("imgCont").style.display="none";
            document.getElementById("imgCont").style.left="-150vh";
            document.getElementById("imgCont2").classList.remove("droVmil");
            document.getElementById("imgCont2").style.left="0vh";
            document.getElementById("imgCont3").style.right="-150vh";
        },1900);
        optAct = document.getElementById("imgCont2");
    }
    else if(optAct === document.getElementById("imgCont2")){
        document.getElementById("imgCont2").classList.add("milVgau");
        document.getElementById("imgCont3").style.display="block";
        document.getElementById("imgCont3").classList.add("droVmil");
        setTimeout(function(){
            document.getElementById("imgCont2").classList.remove("milVgau");
            document.getElementById("imgCont2").style.display="none";
            document.getElementById("imgCont2").style.left="-150vh";
            document.getElementById("imgCont3").classList.remove("droVmil");
            document.getElementById("imgCont3").style.right="0vh";
            document.getElementById("imgCont1").style.right="-150vh";
        },1900);
        optAct = document.getElementById("imgCont2");
    }else{
        document.getElementById("imgCont3").classList.add("milVgau");
        document.getElementById("imgCont1").style.display="block";
        document.getElementById("imgCont1").classList.add("droVmil");
        setTimeout(function(){
            document.getElementById("imgCont3").classList.remove("milVgau");
            document.getElementById("imgCont3").style.display="none";
            document.getElementById("imgCont3").style.left="-150vh";
            document.getElementById("imgCont1").classList.remove("droVmil");
            document.getElementById("imgCont1").style.right="0vh";
            document.getElementById("imgCont2").style.right="-150vh";
        },1900);
        optAct = document.getElementById("imgCont2");
    };
});