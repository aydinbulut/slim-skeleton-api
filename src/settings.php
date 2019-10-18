<?php

use Monolog\Logger;

return [
    'displayErrorDetails' => true, // Should be set to false in production
    'db' => [
        'driver' => 'mysql',
        'host' => 'slim-db',
        'port' => '3306',
        'database' => 'slimphp',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
    'logger' => [
        'name' => 'slim-app',
        'path' => __DIR__ . '/logs/app_'.date('Y-m-d').'.log',
        'level' => Logger::NOTICE,
    ],
    'debug' => true,
    'secret' => 'slimphpskletonwitheloquentandmigrationandvalidatorandjwt'
];