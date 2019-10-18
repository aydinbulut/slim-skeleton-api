<?php


namespace App\Controllers;


use App\Models\Student;
use App\Utils\ValidatorFactory;
use Illuminate\Validation\ValidationException;
use JSend\JSendResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;

class StudentsController
{
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    // Get Student List
    public function get(Request $request, Response $response, $args)
    {
        $students = Student::all();

        return $response->withJson(JSendResponse::success($students->toArray()));
    }

    // Get Student Detail
    public function getItem(Request $request, Response $response, $args)
    {
        try {
            $student = Student::find($args['id']);

            if ($student === null)
                throw new NotFoundException($request, $response);

            return $response->withJson(JSendResponse::success($student->toArray()));
        } catch (NotFoundException $e) {
            return $response->withJson(JSendResponse::fail(['message' => "Student not found"]));
        } catch (\Exception $e) {
            return $response->withJson(JSendResponse::error('Something went wrong', null, ['detail' => $e->getMessage()]));
        }
    }

    // Create Student
    public function post(Request $request, Response $response, $args)
    {
        try {
            $validator = (new ValidatorFactory())->make(
                $request->getParsedBody(),
                [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'year_of_class' => 'required',
                ]
            );
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $student = new Student();
            $student->firstname = $request->getParsedBody()['firstname'];
            $student->lastname = $request->getParsedBody()['lastname'];
            $student->year_of_class = $request->getParsedBody()['year_of_class'];
            $student->save();

            return $response->withJson(JSendResponse::success($student->toArray()));
        } catch (ValidationException $e) {
            return $response->withJson(JSendResponse::fail(['message' => 'Request is not valid', 'errors' => $e->errors()]));
        } catch (\Exception $e) {
            return $response->withJson(JSendResponse::error('Something went wrong.', null, ['message' => '', 'detail' => $e->getMessage()]));
        }
    }
}