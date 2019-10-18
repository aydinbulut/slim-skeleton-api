<?php
// DIC configuration


use Illuminate\Database\Capsule\Manager;

$container = $app->getContainer();

// DB
$container['db'] = function ($c) {
    $capsule = new Manager;
    $capsule->addConnection($c->get('settings')['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};