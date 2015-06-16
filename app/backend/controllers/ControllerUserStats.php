<?php

class ControllerUserStats extends MasterController
{
	public function __construct() {
		parent::__construct();
	}


	public function getHTML($sContent = NULL)
	{
		global $manager;
		global $sections;
		$params = Manager::getParams();
		
		$vista ="list";

		if (array_key_exists(2, $params)) {
			if ($params[2] == 'user') {
				self::showUser($params[3]);
			}
			else {
				self::listaUsers();	
			}
		}
		else {
			self::listaUsers();	
		}

		


		


		
		return parent::getOutputContent();
	}

	public function showUser() {
		parent::setView('estadisticas/usuario.html');

	}

	public function listaUsers() {
		//
	} 
}