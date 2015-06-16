<?php
class Manager
{

	public static function render()
	{

		global $sections;
		$render_app = Manager::getApp(); // Identifico la App 
		

		Manager::loadFiles(APP_PATH.$render_app."/system/"); // Cargo Config para app
		Manager::loadFiles(APP_CONTROLLERS_PATH); // Cargo Controladores para APP

		//Common::DebugThis(APP_CONTROLLERS_PATH);


		$controller = Manager::getController(); //Idenfitico Controlador para la app


		$class = $sections[$controller]['controller']['name']; // Nombre del Controlador

		// Common::DebugThis($class);
		// Common::DebugThis($controller);

		$objController = new $class(); // Invoco la clase en una variable
		$sHtml = $objController->getHTML(); //Contenido para la seccion
		if ($sections[$controller]["no_container"] == true) {
			return $sHtml;

		}
		else {
			$oTplContainer = new ControllerContainer();
			return $oTplContainer->getHTML( $sHtml );
		}
		

	}


	public static function getApp() {
		global $app_default;
		global $app;

		$params = Manager::getParams();
		
		if (is_array($params) == false) {
			return $app_default;
		} 
		// Common::DebugThis($params);
		// Common::DebugThis($app);


		if ( $params != null) {
			if (array_key_exists($params[0], $app)) {
				return $params[0];
			} else {
				return $app_default;
			}
		}


		return $app_default;

	}

	public static function loadFiles($path) {
		foreach (glob($path."*.php") as $filename)
		{
			include_once($filename);
		}
	}



	public static function getController()
	{
		global $sections_default;
		global $sections;
		global $app_default;
		// global $app;

	




		if (APP_LOGIN_MODE == true){ //LOGIN MODE ESTA ACTIVADO


			if ( (Manager::getApp() == "frontend" && Session::get("userid") != false) || (Manager::getApp() == "backend" && Session::get("backendLogin") != false) ) { //EXISTE UNA SESSION CREADA

				$params = self::getParams();

				if (is_array($params) == false) {
					return $sections_default;
				} 
				$controllerKey = (Manager::getApp() == $app_default) ? 0 : 1;
				if(isset($params[$controllerKey])) {
					$controllerHref = $params[$controllerKey];
				}
				if (!isset($controllerHref)) {
					$controllerHref = $GLOBALS['sections_default'];
				}
				if (array_key_exists($controllerHref, $sections)) {
					return $controllerHref;
				} 
				else {
					return $sections_default;
				}

				// $params = isset($_GET['params']) ? $_GET['params'] : "" ;
				// if ($params == "") 
				// {
				// 	return $sections_default;
				// }

				// $items = explode("/", $params);
				// if (! array_key_exists($items[0], $sections))
				// {
				// 	return $sections_default;
				// }
				// return $items[0];
			}
			else { //No hay session creada
				$params = isset($_GET['params']) ? $_GET['params'] : "" ;
				$items = explode("/", $params);
				if ($items[0] != "ws") { return "login"; }
				else { return "ws"; }
			}

		} //Login mode no esta activado
		else {
			$params = self::getParams();

			//Common::DebugThis($params);
			//echo var_dump($params);
			if (is_array($params) == false) {
				return $sections_default;
			} 
			//echo $app_default;
			// exit;




			$controllerKey = (Manager::getApp() == $app_default) ? 0 : 1;
			if(isset($params[$controllerKey])) {
				$controllerHref = $params[$controllerKey];
			}
			if (!isset($controllerHref)) {
				$controllerHref = $GLOBALS['sections_default'] = 'home';
			}
			if (array_key_exists($controllerHref, $sections)) {
				return $controllerHref;
			} 
			else {
				return $sections_default;
			}


		}
	}

	public static function getParams()
	{
		global $sections;

		$params = isset($_GET['params']) ? $_GET['params'] : "" ;
		if ($params != "") 
		{
			$params = explode("/", $params);
			return $params;
		}
		return array();
	}
}
?>