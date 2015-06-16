<?php
/**
 * Constantes del sistema
 */


define( 'APP_MAIN_SITE'         , 'HERE GOES YOUR APP URL');
define( 'APP_WEB_PATH'				, APP_MAIN_SITE );
//define( 'WEB_FOLDER'			, dirname(dirname(dirname(dirname(__FILE__)))));

define('LOGIN_MODE', false);

if (!defined('CUSTOMER')) define('CUSTOMER', 'FONTEND TITLE');

if (!defined('SYSTEM_PATH')) define('SYSTEM_PATH', ROOT_PATH    . 'app/system/');
if (!defined('LIB_PATH')) define('LIB_PATH', SYSTEM_PATH  . 'lib/');


define( 'APP_CONTROLLERS_PATH'	, APP_PATH     . Manager::getApp().'/controllers/' );
define( 'APP_VIEWS_PATH'		, APP_PATH     . Manager::getApp().'/views/' );


//PAGINADO
if (!defined('ITEMS_PER_PAGE')) define('ITEMS_PER_PAGE', 10);

?>
