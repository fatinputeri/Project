<?php 
require _DIR_ . '/../vendor/autoload.php'; 

// Instantiate the app 
$settings = require _DIR_ . '/../src/settings.php'; 
$app = new \Slim\App($settings); 

// Set up dependencies 
require _DIR_ . '/../src/dependencies.php'; 

// Register routes 
require _DIR_ . '/../src/routes.php';

// Run app 
$app->run();