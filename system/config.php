<?php

//date_default_timezone_set('America/Sao_Paulo');


$app_default		= "frontend";
$app['backend'] 	= "backend";



/**
 * Constantes del sistema
 */

define( 'ROOT_PATH'             , dirname(dirname(__FILE__)).'/');
define( 'MAIN_SITE'             , 'SITE URL');
define( 'WEB_PATH'				, MAIN_SITE );
define( 'WEB_FOLDER'			, ROOT_PATH.'public_html/');
// define( 'LOGIN_MODE'			, false );
define( 'CUSTOMER'				, "University" );


define( 'SYSTEM_PATH'			, ROOT_PATH    	. 'system/' );
define( 'LIB_PATH'				, ROOT_PATH	   	. 'core/' );
define( 'APP_PATH'				, ROOT_PATH	   	. 'app/' );
define( 'MODELS_PATH'			, ROOT_PATH    	. 'models/' );
define( 'MODULES_PATH'			, ROOT_PATH    	. 'modules/' );
define( 'CSS_PATH'				, MAIN_SITE  	. 'css/' );
define( 'IMG_PATH'				, MAIN_SITE  	. 'img/' );
define( 'JS_PATH'				, MAIN_SITE  	. 'js/' );
define( 'UPLOADS_PATH'			, MAIN_SITE  	. 'uploads/');
define( 'UPLOADS_FOLDER'		, ROOT_PATH    	. 'public_html/uploads/');
define( 'VIDEOS_FOLDER'			, ROOT_PATH    	. 'public_html/videos/');
define( 'VIDEOS_PATH'			, MAIN_SITE    	. 'videos/');
define( 'LIBROS_FOLDER'			, ROOT_PATH    	. 'public_html/libros/');
define( 'LIBROS_PATH'			, MAIN_SITE    	. 'libros/');


define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'enterdbuser' );
define( 'DB_PASS', 'enterdbpass' );
define( 'DB_NAME', 'enterdbname' );


//PAGINAD`O

define( 'ITEMS_PER_PAGE' , 10);

//Todo lo que se necesita incluir
$libs = array(
	'HandlerError.php',
	'Session.php',
	'class.phpmailer.php', 
	'class.smtp.php', 
	'class.TemplatePower.inc.php', 
	'MasterController.php',
	'seedDb.php', 
	'FormManager.php',
	'Common.php', 
	'Manager.php',
	'MPDF54/mpdf.php'
);


foreach ($libs as $value) {
	include_once(LIB_PATH . $value);
}
Manager::loadFiles(MODELS_PATH);
Manager::loadFiles(MODULES_PATH);

//include_once( CONTROLLERS_PATH . 'ControllerContainer.php' );
Session::start();