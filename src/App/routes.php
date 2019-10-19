<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$authRoutes = require_once __DIR__ . '/Routes/AuthRoutes.php';
$studentRoutes = require_once __DIR__ . '/Routes/StudentRoutes.php';

$container = $app->getContainer();

// Welcoming route
$app->get('/', function (Request $request, Response $response) {
    return $response->withJson(['status' => 'success', 'message' => "Welcome to Slim-PHP API skeleton"]);
});

// Auth group
$app->group('/auth', $authRoutes);

// Routes for students
$app->group('/students', $studentRoutes);