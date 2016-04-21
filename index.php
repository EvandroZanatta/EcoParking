<?php

require 'vendor/slim/slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();
$GLOBALS['mustache'] = new Mustache_Engine;

// Set the current mode
$app = new \Slim\Slim(array(
    'mode' => 'production'
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

$app->get('/', function () {
    global $mustache;
    echo $mustache->render('Hello {{planet}}', array('planet' => 'World!')); // "Hello World!"
});

header("Access-Control-Allow-Origin: *");
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->run();
?>