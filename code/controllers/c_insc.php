<?php

require_once(PATH_MODELS.'m_insc.php');
if(isset($_GET['pseudo'])){
    $pseudo = htmlspecialchars($_GET['pseudo']);
    $result = checkPseudo($pseudo);
    if($result){
        echo "true";
    }
    else{
        echo "false";
    }
}

if(isset($_GET['mail'])){
    $mail = htmlspecialchars($_GET['mail']);
    $result = checkMail($mail);
    if($result){
        echo "true";
    }
    else{
        echo "false";
    }
}

/**if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pwd']) && isset($_POST['pwdC']) && isset($_POST['desc'])){

    $password = getPwd($_POST['login']);

    if($password){

        if(password_verify($_POST['password'], $password["motDePasse"])){
            $_SESSION['logged'] = 1;
            header('Location: index.php');
        }
        else {
            $_SESSION['logged'] = 2;
        }

    }
}**/

require_once(PATH_VIEWS.$page.'.php');