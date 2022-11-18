<?php
if(isset($_POST['login']) && isset($_POST['password'])){

    if(password_verify($_POST['password'], passwordAd) && $_POST['login'] == username){
        $_SESSION['logged'] = 1;
    }
    else if($_POST['login'] != username){
        $_SESSION['logged'] = 2;
    }
    else if (!password_verify($_POST['password'], passwordAd)){
        $_SESSION['logged'] = 3;
    }

}

require_once(PATH_MODELS.'m_login.php');
require_once(PATH_VIEWS.$page.'.php');