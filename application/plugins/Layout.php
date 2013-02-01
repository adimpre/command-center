<?php

class Application_Plugin_Layout extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        // On r�cup�re la vue
        $view = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getResource('view');
        
        // On d�finit le titre de l'application
        $view->headTitle("Module utilisateur")
            ->setSeparator(" | ")
            ->append(strip_tags( $view->navigation()->breadcrumbs()->setMinDepth(0)->setSeparator(" > ") ));
            
        // On lie les feuilles de style
        $view->headLink();
        /*
            ->appendStylesheet("/css/core/core.css")
            ->appendStylesheet("/css/style.css");
        */
            
        // Balises META de l'application
        $view->headMeta()
            ->appendName('viewport', 'width=device-width,initial-scale=1')
            ->appendHttpEquiv('X-UA-Compatible', 'IE=edge,chrome=1');
            /*
            ->appendName('description', 'KICKSTATR - Description de l\'app')
            ->appendName('author', 'K�vin DUBUC')
            ->appendName('keywords', 'KICKSTATR, tags')
            */
            
        // Scripts �xecut�s en fin de page
        $view->inlineScript();
        /*
        ->appendFile("//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js")
        ->appendFile("/js/libs/twitter.bootstrap.js")
        ->appendFile("/js/script.js")
        ->appendFile("/js/plugins.js");
        */
            
        // Ic�ne du site
        $view->headLink()
            ->headLink(array("rel" => "shortcut icon", "href" => "/favicon.ico"));
    }
}