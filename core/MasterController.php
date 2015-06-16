<?php

class MasterController extends TemplatePower
{
	public function __construct() {
		global $sections;
		
		$controller = Manager::getController();
		parent::__construct( APP_VIEWS_PATH . $sections[$controller]['view'] );
		parent::prepare();
		
		// Variables Globales
        parent::assignGlobal('WEB_PATH', APP_WEB_PATH);
        parent::assignGlobal('CSS_PATH', CSS_PATH);
        parent::assignGlobal('JS_PATH', JS_PATH);
        parent::assignGlobal('IMG_PATH', IMG_PATH);
        parent::assignGlobal('VIDEOS_PATH', VIDEOS_PATH);
        parent::assignGlobal('LIBROS_PATH', LIBROS_PATH);
        parent::assignGlobal('CUSTOMER', CUSTOMER);
        parent::assignGlobal('UPLOADS_PATH', UPLOADS_PATH);
        
		
	}

	public function setView($viewfile){
		parent::__construct( APP_VIEWS_PATH . $viewfile );
		parent::prepare();
	}

	public function selectOptions($blockName, $label, $value, $selected='nohayselected') {
		parent::newBlock($blockName);
		$selectedText = ($value == $selected) ? 'selected' : '';		
		

		parent::assign( $blockName."-LABEL"		, $label );
		if ($selected) {
			parent::assign( $blockName."-SELECTED"	, $selectedText );
		}
		parent::assign( $blockName."-VALUE"		, $value);
		parent::gotoBlock("_ROOT");	
	}

}

?>