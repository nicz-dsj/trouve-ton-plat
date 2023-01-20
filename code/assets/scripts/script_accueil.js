var optAct = document.getElementById("imgCont")

txt1 = document.getElementById("promo1textBox");
txt2 = document.getElementById("promo2textBox");
txt3 = document.getElementById("promo3textBox");
bg = document.getElementById("blur");

//add hover listener to each promo
txt1.addEventListener('mouseover', function () {
    bg.classList.remove("removeBlur");
    bg.classList.add("addBlur");
    setTimeout(function () {
        bg.style.backdropFilter = "blur(5px)";
        bg.style.backgroundColor = "rgba(0,0,0,0.5)";
    }, 1000);
}
);
txt1.addEventListener('mouseout', function () {
    bg.classList.remove("addBlur");
    bg.classList.add("removeBlur");
    setTimeout(function () {
        bg.style.backdropFilter = "blur(0px)";
        bg.style.backgroundColor = "rgba(0,0,0,0)";
    }, 1000);
}
);

txt2.addEventListener('mouseover', function () {
    bg.classList.remove("removeBlur");
    bg.classList.add("addBlur");
    setTimeout(function () {
        bg.style.backdropFilter = "blur(5px)";
        bg.style.backgroundColor = "rgba(0,0,0,0.5)";
    }, 1000);
}
);
txt2.addEventListener('mouseout', function () {
    bg.classList.remove("addBlur");
    bg.classList.add("removeBlur");
    setTimeout(function () {
        bg.style.backdropFilter = "blur(0px)";
        bg.style.backgroundColor = "rgba(0,0,0,0)";
    }, 1000);
}
);

txt3.addEventListener('mouseover', function () {
    bg.classList.remove("removeBlur");
    bg.classList.add("addBlur");
    setTimeout(function () {
        bg.style.backdropFilter = "blur(5px)";
        bg.style.backgroundColor = "rgba(0,0,0,0.5)";
    }, 1000);
}
);
txt3.addEventListener('mouseout', function () {
    bg.classList.remove("addBlur");
    bg.classList.add("removeBlur");
    setTimeout(function () {
        bg.style.backdropFilter = "blur(0px)";
        bg.style.backgroundColor = "rgba(0,0,0,0)";
    }, 1000);
}
);