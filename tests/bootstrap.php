<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', 'testing');

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

// Configure database connection
$dbConfig = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'application.ini', APPLICATION_ENV);

$dbAdapter = Zend_Db::factory($dbConfig->resources->db->adapter, array(
    'host'     => $dbConfig->resources->db->params->host,
    'username' => $dbConfig->resources->db->params->username,
    'password' => $dbConfig->resources->db->params->password,
    'dbname'   => $dbConfig->resources->db->params->dbname
));

Zend_Db_Table::setDefaultAdapter($dbAdapter);