<?php
/**
 * Constantes del sistema
 */

define( 'APP_MAIN_SITE'         , 'URL TO YOUR APP');
define( 'APP_WEB_PATH'				, APP_MAIN_SITE );
//define( 'WEB_FOLDER'			, dirname(dirname(dirname(dirname(__FILE__)))));
define( 'LOGIN_MODE'			, true );
if (!defined('APP_CUSTOMER')) define( 'APP_CUSTOMER'			, "BACKEND" );


if (!defined('SYSTEM_PATH')) define( 'SYSTEM_PATH'			, ROOT_PATH    . 'app/system/' );
if (!defined('LIB_PATH')) define( 'LIB_PATH'				, SYSTEM_PATH  . 'lib/' );

define( 'APP_CONTROLLERS_PATH'	, APP_PATH     . Manager::getApp().'/controllers/' );
define( 'APP_VIEWS_PATH'		, APP_PATH     . Manager::getApp().'/views/' );
define( 'APP_LOGIN_MODE'			, true);


//PAGINADO

if (!defined('ITEMS_PER_PAGE')) define( 'ITEMS_PER_PAGE' , 10);