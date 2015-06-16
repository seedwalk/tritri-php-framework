<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once( dirname(dirname(__FILE__)).'/system/config.php' );
echo Manager::render();


?>