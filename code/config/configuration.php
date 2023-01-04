<?php
 
const DEBUG = true; // production : false; dev : true

// Accès base de données
const BD_HOST = 'mysql-trouvetonplat.alwaysdata.net';
const BD_DBNAME = 'trouvetonplat_bd';
const BD_USER = '289080';
const BD_PWD = 'trouveton784512';

// Langue du site
const LANG ='FR-fr';

// Paramètres du site : nom de l'auteur ou des auteurs
const AUTEUR = 'Noé Chouteau, Viggo Casciano, Aro Randriamanantena et Nicolas De Saint Jean'; 

//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ASSETS','./assets/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/v_');
define('PATH_TEXTES','./languages/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'img/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');
define('PATH_PLATS', PATH_IMAGES.'plats/');

//fichiers
define('PATH_LOGO', PATH_IMAGES.'logo_iut.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');
