<?php

class ControllerCountryStats extends MasterController
{
	public function __construct() {
		parent::__construct();
	}


	public function getHTML($sContent = NULL)
	{
		global $manager;
		global $sections;
		$params = Manager::getParams();
		$vista = 'list';


		
		


		
		return parent::getOutputContent();
	}
}