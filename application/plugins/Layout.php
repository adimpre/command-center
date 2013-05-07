<?php

class Application_Plugin_Layout extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        // On r�cup�re la vue
        $view = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getResource('view');

        // On d�finit le titre de l'application
        $view->headTitle("Command Center")
            ->setSeparator(" | ")
            ->append(strip_tags( $view->navigation()->breadcrumbs()->setMinDepth(0)->setSeparator(" > ") ));
            
        // LESS file for development env
        // min CSS file for production env
        if(APPLICATION_ENV !== "production")
        {
            $view->headLink()->appendStylesheet(ASSETS_PATH . 'css/main.less?v=' . time(), 'all', null, array('rel' => 'stylesheet/less'));
        }
        else
        {
            $view->headLink()->appendStylesheet(ASSETS_PATH . 'css/main.css', 'all');
        }
            
        // Balises META de l'application
        $view->headMeta()
            ->appendName('viewport', 'width=device-width,initial-scale=1')
            ->appendHttpEquiv('X-UA-Compatible', 'IE=edge,chrome=1')
            ->appendName('description', 'Centre de commande de l\'�cosyst�me applicatif du SDIS 62')
            ->appendName('author', 'SDIS 62');
            
        // Javascript
        // (LESS required for non-production env)
        if(APPLICATION_ENV !== "production")
        {
            $view->inlineScript()
                ->setAllowArbitraryAttributes(true)
                ->appendFile(ASSETS_PATH . "components/less.js/dist/less-1.3.3.min.js")
                ->appendFile(ASSETS_PATH . "components/requirejs/require.js")
                ->appendFile(ASSETS_PATH . "js/main.js");
        }
        else
        {
            $view->inlineScript()
            ->appendFile(ASSETS_PATH . "js/main.min.js", "text/javascript");
        }
 
        // Ic�ne du site
        $view->headLink()->headLink(array("rel" => "shortcut icon", "href" => ASSETS_PATH . "favicon.ico"));
    }
}