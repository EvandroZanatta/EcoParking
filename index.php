<?php

require 'vendor/slim/slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require('vendor/smarty/smarty/libs/Smarty.class.php');
$GLOBALS['smarty'] = new Smarty();
$smarty->setTemplateDir('views/templates');
$smarty->setCompileDir('views/templates_c');
$smarty->setCacheDir('views/cache');
$smarty->setConfigDir('views/configs');

// Set the current mode
$app = new \Slim\Slim(array(
    'mode' => 'development'
));
// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});
// Only invoked if mode is "development"
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

/* 
    Routes
*/

//autoload controller
function loadController($file_name){
    include_once('controller/'.$file_name.'.php');
}

$app->get('/', function () {
    global $mustache;
    echo "/";
});

$app->get('/login', function () {
    loadController("login");
});

$app->get('/test', function () {
    
});

header("Access-Control-Allow-Origin: *");
$app->run();
?>