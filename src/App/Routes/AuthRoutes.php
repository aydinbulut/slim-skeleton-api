<?php

use Slim\App;

return function (App $app) {
    $app->post('/login', \App\Controllers\AuthController::class . ':login');
};