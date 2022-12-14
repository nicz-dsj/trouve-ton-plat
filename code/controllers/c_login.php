<?php

require_once(PATH_MODELS.'m_login.php');

if(isset($_POST['login']) && isset($_POST['password'])){

    $password = getPwd($_POST['login']);

        if(password_verify($_POST['password'], $password["motDePasse"])){
            $_SESSION['logged'] = 1;
            header('Location: index.php');
        }
        else {
            $_SESSION['logged'] = 2;
        }


}

require_once(PATH_VIEWS.$page.'.php');