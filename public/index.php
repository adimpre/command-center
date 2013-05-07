<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
    
// Define assets path
defined('ASSETS_PATH')
    || define('ASSETS_PATH', (getenv('ASSETS_PATH') ? getenv('ASSETS_PATH') : ( in_array(APPLICATION_ENV, array("development", "testing")) ? "/" : dirname($_SERVER["PHP_SELF"]) . DIRECTORY_SEPARATOR )));

// Get include path
set_include_path(implode(PATH_SEPARATOR, array(
    get_include_path(),
)));

// Load libraries
try
{
    $path_to_autoload = APPLICATION_PATH . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

    if (!file_exists($path_to_autoload))
    {
        throw new Exception ('autoload.php does not exist. run \'php composer.phar install\'.');
    }

    $loader = require $path_to_autoload;
    $loader->add('Zend_', __DIR__);
}
catch(Exception $e)
{
    echo "Message : " . $e->getMessage();
    echo "Code : " . $e->getCode();
    die();
}

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();