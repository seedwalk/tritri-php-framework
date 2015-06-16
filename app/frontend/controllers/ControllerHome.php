<?php

class ControllerHome extends MasterController
{
	public function __construct() {
		parent::__construct();
	}


	public function getHTML( ) {
		// i18n::setLang();
		// i18n::setDir();
		// i18n::loadPhrases();
		// echo i18n::get('prueba');


		$params = Manager::getParams();






		return parent::getOutputContent();
	}





}