<?php


namespace App\Controllers;


use App\Models\Student;
use App\Utils\ValidatorFactory;
use Firebase\JWT\JWT;
use Illuminate\Validation\ValidationException;
use JSend\JSendResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController
{
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    // Login
    public function login(Request $request, Response $response, $args)
    {
        try {
            $validator = (new ValidatorFactory())->make(
                $request->getParsedBody(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $secret = $this->container->get('settings')['secret'];
            $token = [
                'email' => $request->getAttribute('email'),
                'titme' => time(),
                'status' => true
            ];

            $jwt = JWT::encode($token, $secret);

            return $response->withJson(JSendResponse::success(['data' => ['jwt' => $jwt]]));
        } catch (ValidationException $e) {
            return $response->withJson(JSendResponse::fail(['message' => 'Request is not valid', 'errors' => $e->errors()]));
        } catch (\Exception $e) {
            return $response->withJson(JSendResponse::error('Something went wrong.', null, ['message' => '', 'detail' => $e->getMessage()]));
        }
    }

}