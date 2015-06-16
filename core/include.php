<?php

date_default_timezone_set('America/Sao_Paulo');

foreach ($libs as $value) {
	include_once(LIB_PATH . $value);
}
include_once( CONTROLLERS_PATH . 'ControllerContainer.php' );
Session::start();

?>