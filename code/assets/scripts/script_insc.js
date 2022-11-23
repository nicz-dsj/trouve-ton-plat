var timer;                
var timerFin = 2000;
var pseudo = document.getElementsByName("pseudo")[0];
var mail = document.getElementsByName("mail")[0]


function ecrit(){
    clearTimeout(timer);
    if (document.getElementsByName("pseudo")[0].value) {
        timer = setTimeout(finiEcrirePseudo, timerFin);
    }
}

function finiEcrirePseudo() {
    var php_var = "<?php echo $php_var; ?>";
    document.cookie = "pse = " + pseudo.val;
    return(pseudo.val);
}

pseudo.addEventListener('keyup',ecrit);

