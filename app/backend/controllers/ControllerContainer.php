<?php

class ControllerContainer extends TemplatePower {

    public function __construct() {

    }

    public function getHTML($sContent = NULL) {
        parent::__construct(APP_VIEWS_PATH . 'container.html');
        parent::prepare();

        // Variables Globales
        parent::assignGlobal('WEB_PATH', APP_WEB_PATH);
        parent::assignGlobal('CSS_PATH', CSS_PATH);
        parent::assignGlobal('JS_PATH', JS_PATH);
        parent::assignGlobal('LIB_PATH', LIB_PATH);
        parent::assignGlobal('IMG_PATH', IMG_PATH);
        parent::assignGlobal('VIDEOS_PATH', VIDEOS_PATH);
        #parent::assignGlobal('AJAX_PATH', AJAX_PATH);
        parent::assignGlobal('NO_CACHE', time());
        parent::assignGlobal('CUSTOMER', APP_CUSTOMER);
        parent::assignGlobal('USERID', Session::get("userid"));
        
        parent::assignGlobal('sMainContent', $sContent);

        global $sections;



        foreach($sections as $section) {
            if (array_key_exists("no_topmenu",$section) && !$section['no_topmenu']) {


                if(Manager::getController() == $section["href"]) {
                    $active = 'class="active"';
                }  
                else { 
                    $active = ''; 
                }

                
                parent::newBlock("TOPMENUITEM");

                parent::assign( 'LABEL' , $section["label"] );


                parent::assign( 'HREF' , $section["href"] );
                parent::assign( 'ACTIVE' , $active );
                parent::gotoBlock("_ROOT");
            }

        }
        $params = Manager::getParams();

        if (array_key_exists(1, $params)) {
            if ($params[1] == "general-stats") {
                parent::assign( 'STATSGENERALACTIVE'    , 'class="active"' );        
            }
            elseif ($params[1] == "country-stats") {
                parent::assign( 'STATSCOUNTRYACTIVE'    , 'class="active"' );        
            }
            elseif ($params[1] == "user-stats") {
                parent::assign( 'STATSUSERACTIVE'    , 'class="active"' );        
            }
            elseif ($params[1] == "escuelas") {
                parent::assign( 'STATSESCUELASACTIVE'    , 'class="active"' );        
            }

            elseif ($params[1] == "videos") {
                parent::assign( 'STATSVIDEOSACTIVE'    , 'class="active"' );        
            }

            elseif ($params[1] == "tags") {
                parent::assign( 'STATSTAGSACTIVE'    , 'class="active"' );        
            }

            elseif ($params[1] == "libros") {
                parent::assign( 'STATSLIBROSSACTIVE'    , 'class="active"' );        
            }
            elseif ($params[1] == "test") {
                parent::assign( 'STATSTESTSACTIVE'    , 'class="active"' );        
            }
        }
        else {
            
        }
        
        

        





        return parent::getOutputContent();
    }

}