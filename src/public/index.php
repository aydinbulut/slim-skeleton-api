<?php

use Symfony\Component\Debug\Debug;

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_error_handler(function ($severity, $message, $file, $line) {
    if (error_reporting() & $severity) {
        throw new \ErrorException($message, 0, $severity, $file, $line);
    }
});

require_once '../vendor/autoload.php';

$settings = require __DIR__ . '/../settings.php';

if ($settings['debug'] === true) {
    Debug::enable();
}

// Instantiate the app
$app = new \Slim\App(['settings' => $settings]);

// Set up dependencies
require __DIR__ . '/../app/dependencies.php';

// Register middleware
require __DIR__ . '/../app/middleware.php';

// Register routes
require __DIR__ . '/../app/routes.php';

// GET DI Container
$container = $app->getContainer();

// Start DB connection
$container->get('db');

// Run app
$app->run();