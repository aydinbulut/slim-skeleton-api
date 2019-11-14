<?php

use Monolog\Logger;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

return [
    'displayErrorDetails' => true, // Should be set to false in production
    'db' => [
        'driver' => 'mysql',
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'database' => $_ENV['DB_NAME'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
    'logger' => [
        'name' => 'slim-app',
        'path' => __DIR__ . '/logs/app_'.date('Y-m-d').'.log',
        'level' => Logger::NOTICE,
    ],
    'secret' => 'slimphpskletonwitheloquentandmigrationandvalidatorandjwt'
];