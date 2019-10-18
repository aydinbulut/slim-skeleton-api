<?php

use JSend\JSendResponse;
use Tuupola\Middleware\JwtAuthentication;

// Middleware list

// Set content-type to json before handling the response
$app->add(function ($request, $response, $next) {
    $response = $response->withHeader('Content-Type', 'application/json');

    return $next($request, $response);
});

// Check for JWT Token in Header
$app->add(new JwtAuthentication([
    "ignore" => ['/auth'],
    "secret" => $settings['secret'],
    "error" => function ($response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];

        return $response->withJson(JSendResponse::success($data));
    }
]));