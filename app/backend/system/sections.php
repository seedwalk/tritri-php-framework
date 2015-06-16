<?php
$GLOBALS['sections_default'] = 'genaral-stats';

/*SHOWN IN MENU */



$GLOBALS['sections']['genaral-stats']['controller']['name'] = 'ControllerGeneralStats';
$GLOBALS['sections']['genaral-stats']['view'] = 'estadisticas/general.html';
$GLOBALS['sections']['genaral-stats']['label'] = "Estadisticas Generales";
$GLOBALS['sections']['genaral-stats']['href'] = "genaral-stats";
$GLOBALS['sections']['genaral-stats']['perms'] = ['admin'];
$GLOBALS['sections']['genaral-stats']['no_topmenu'] = false;
$GLOBALS['sections']['genaral-stats']['no_container'] = false;

$GLOBALS['sections']['country-stats']['controller']['name'] = 'ControllerCountryStats';
$GLOBALS['sections']['country-stats']['view'] = 'estadisticas/country.html';
$GLOBALS['sections']['country-stats']['label'] = "Country Stats";
$GLOBALS['sections']['country-stats']['href'] = "country-stats";
$GLOBALS['sections']['country-stats']['perms'] = ['admin'];
$GLOBALS['sections']['country-stats']['no_topmenu'] = false;
$GLOBALS['sections']['country-stats']['no_container'] = false;

$GLOBALS['sections']['user-stats']['controller']['name'] = 'ControllerUserStats';
$GLOBALS['sections']['user-stats']['view'] = 'estadisticas/list_usuarios.html';
$GLOBALS['sections']['user-stats']['label'] = "user Stats";
$GLOBALS['sections']['user-stats']['href'] = "user-stats";
$GLOBALS['sections']['user-stats']['perms'] = ['admin'];
$GLOBALS['sections']['user-stats']['no_topmenu'] = false;
$GLOBALS['sections']['user-stats']['no_container'] = false;











/*NOT SHOWN IN MENU */




$GLOBALS['sections']['login']['controller']['file'] = 'ControllerLogin.php';
$GLOBALS['sections']['login']['controller']['name'] = 'ControllerLogin';
$GLOBALS['sections']['login']['view'] = 'login/login.html';
$GLOBALS['sections']['login']['models'] = ['User.php'];
$GLOBALS['sections']['login']['label'] = "Login";
$GLOBALS['sections']['login']['href'] = "login";
$GLOBALS['sections']['login']['no_topmenu'] = true;
$GLOBALS['sections']['login']['no_container'] = true;






?>